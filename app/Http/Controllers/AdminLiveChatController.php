<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLiveChatController extends Controller
{
    public function index()
    {
        // Get waiting and active live sessions
        $sessions = ChatSession::whereIn('status', ['waiting', 'live'])
            ->with(['messages' => function ($q) {
                $q->latest()->limit(1); // Get last message for preview
            }])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.livechat.index', compact('sessions'));
    }

    public function show(ChatSession $session)
    {
        if ($session->status === 'waiting') {
            $session->update([
                'status' => 'live',
                'admin_id' => Auth::id()
            ]);
            
            // Auto send greeting
            ChatMessage::create([
                'chat_session_id' => $session->id,
                'sender_type' => 'admin',
                'message' => 'Halo! Saya petugas Customer Service. Ada yang bisa saya bantu?'
            ]);
        }

        $session->load('messages');
        return view('admin.livechat.show', compact('session'));
    }

    public function reply(Request $request, ChatSession $session)
    {
        $request->validate(['message' => 'required|string']);

        $message = ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender_type' => 'admin',
            'message' => $request->message
        ]);

        $session->touch(); // Update timestamp

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function close(ChatSession $session)
    {
        $session->update(['status' => 'closed']);
        
        ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender_type' => 'admin',
            'message' => 'Sesi chat telah diakhiri oleh petugas. Terima kasih telah menghubungi layanan kami.'
        ]);

        return redirect()->route('operator.livechat.index')->with('success', 'Sesi chat berhasil ditutup.');
    }

    // Polling for admin to get new user messages
    public function fetchMessages(ChatSession $session, Request $request)
    {
        $lastId = $request->query('last_id', 0);
        $messages = ChatMessage::where('chat_session_id', $session->id)
            ->where('id', '>', $lastId)
            ->orderBy('id', 'asc')
            ->get();
            
        return response()->json([
            'messages' => $messages
        ]);
    }
}
