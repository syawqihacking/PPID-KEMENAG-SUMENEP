<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'session_id' => 'required|string'
        ]);

        $userMessage = $request->message;
        $sessionId = $request->session_id;

        // Find or create session
        $session = ChatSession::firstOrCreate(
            ['session_id' => $sessionId],
            ['status' => 'bot']
        );

        // Save user message
        $userMsg = ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender_type' => 'user',
            'message' => $userMessage
        ]);

        $session->touch();

        // Check if handoff requested
        $isHandoffRequested = preg_match('/(hubungi cs|customer service|bantuan manusia|tanya manusia|admin|cs)/i', $userMessage);

        if ($session->status === 'live') {
            // Do not use AI if live chat is active
            return response()->json(['reply' => null, 'status' => 'live']);
        }

        if ($session->status === 'waiting') {
            return response()->json(['reply' => 'Mohon tunggu sebentar, petugas kami sedang menuju ke obrolan ini...', 'status' => 'waiting']);
        }

        if ($isHandoffRequested) {
            $session->update(['status' => 'waiting']);
            $reply = "Baik, saya akan menghubungkan Anda dengan petugas Customer Service (CS). Mohon tunggu sebentar ya...";
            $botMsg = ChatMessage::create(['chat_session_id' => $session->id, 'sender_type' => 'bot', 'message' => $reply]);
            return response()->json(['reply' => $reply, 'status' => 'waiting', 'messages' => [$userMsg->id, $botMsg->id]]);
        }

        // --- AI LOGIC ---
        $apiKey = env('GROQ_API_KEY');
        if (!$apiKey) {
            return response()->json(['reply' => 'Sistem chatbot tidak aktif (API Key hilang).', 'status' => 'bot']);
        }

        $model = env('GROQ_MODEL', 'llama-3.1-8b-instant');

        $systemPrompt = "Anda adalah asisten virtual resmi PPID Kementerian Agama Kabupaten Sumenep. Jawab pertanyaan pengguna secara langsung, ringkas, dan relevan.

    PETA FITUR WEBSITE (hanya sebutkan jika diminta atau relevan):
    1. Profil PPID: Visi, misi, struktur organisasi.
    2. Standar Layanan: Prosedur permohonan informasi, jangka waktu, biaya (GRATIS).
    3. PPID Info/Dokumen: Daftar informasi publik.
    4. News/Berita: Berita terbaru.
NewsApiController.php

    5. Permohonan Informasi: Formulir permintaan informasi.
    6. Cek Status: Lacak status permohonan.

    Aturan:
    - Jangan mengulang sapaan pembuka jika user sudah bertanya.
    - Jangan menampilkan daftar fitur kecuali diminta.
    - Jika pertanyaan di luar layanan PPID, arahkan kembali secara sopan.
    - Jika pengguna ingin berbicara dengan manusia, minta mereka mengetik 'Hubungi CS'.
    - Gunakan bahasa Indonesia yang ramah dan profesional.
    - Gunakan Markdown seperlunya (hindari list panjang jika tidak diminta).";

        try {
            $knowledges = \App\Models\ChatbotKnowledge::where('is_active', true)->get();
            if ($knowledges->count() > 0) {
                $systemPrompt .= "\n\nREFERENSI UTAMA:\n";
                foreach ($knowledges as $knowledge) {
                    $systemPrompt .= "- [{$knowledge->title}]: {$knowledge->content}\n";
                }
            }
        } catch (\Exception $e) {}

        // Get past messages to keep context (last 5 pairs)
        $pastMessages = ChatMessage::where('chat_session_id', $session->id)
            ->whereIn('sender_type', ['user', 'bot'])
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get()
            ->reverse();

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
        ];

        foreach ($pastMessages as $msg) {
            $messages[] = [
                'role' => $msg->sender_type === 'user' ? 'user' : 'assistant',
                'content' => $msg->message,
            ];
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$apiKey}",
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => $model,
            'messages' => $messages,
            'temperature' => 0.3,
            'max_tokens' => 512,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $reply = $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak mengerti. Ketik "Hubungi CS" jika ingin bantuan manusia.';

            $botMsg = ChatMessage::create(['chat_session_id' => $session->id, 'sender_type' => 'bot', 'message' => $reply]);
            return response()->json(['reply' => $reply, 'status' => 'bot', 'messages' => [$userMsg->id, $botMsg->id]]);
        }

        \Illuminate\Support\Facades\Log::error('Groq API Error: ' . $response->body());

        $errorReply = 'Maaf, layanan AI kami sedang mencapai batas kuota atau sibuk. Silakan ketik **"Hubungi CS"** di sini, atau klik tombol **"Hubungi Kami"** berwarna hijau di pojok kanan bawah untuk bantuan langsung melalui WhatsApp.';
        $botMsg = ChatMessage::create(['chat_session_id' => $session->id, 'sender_type' => 'bot', 'message' => $errorReply]);

        return response()->json(['reply' => $errorReply, 'status' => 'bot', 'messages' => [$userMsg->id, $botMsg->id]]);
    }

    public function poll(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string',
            'last_id' => 'required|numeric'
        ]);

        $session = ChatSession::where('session_id', $request->session_id)->first();
        if (!$session) {
            return response()->json(['messages' => [], 'status' => 'bot']);
        }

        $messages = ChatMessage::where('chat_session_id', $session->id)
            ->where('id', '>', $request->last_id)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'messages' => $messages,
            'status' => $session->status
        ]);
    }
}
