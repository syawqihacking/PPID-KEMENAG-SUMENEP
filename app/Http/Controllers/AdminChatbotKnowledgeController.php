<?php

namespace App\Http\Controllers;

use App\Models\ChatbotKnowledge;
use Illuminate\Http\Request;

class AdminChatbotKnowledgeController extends Controller
{
    public function index()
    {
        $knowledges = ChatbotKnowledge::latest()->get();
        return view('admin.chatbot_knowledge.index', compact('knowledges'));
    }

    public function create()
    {
        return view('admin.chatbot_knowledge.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ]);

        ChatbotKnowledge::create([
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.chatbot_knowledge.index')
            ->with('success', 'Materi pengetahuan AI berhasil ditambahkan.');
    }

    public function edit(ChatbotKnowledge $chatbotKnowledge)
    {
        return view('admin.chatbot_knowledge.form', compact('chatbotKnowledge'));
    }

    public function update(Request $request, ChatbotKnowledge $chatbotKnowledge)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $chatbotKnowledge->update([
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.chatbot_knowledge.index')
            ->with('success', 'Materi pengetahuan AI berhasil diperbarui.');
    }

    public function destroy(ChatbotKnowledge $chatbotKnowledge)
    {
        $chatbotKnowledge->delete();
        return redirect()->route('admin.chatbot_knowledge.index')
            ->with('success', 'Materi pengetahuan AI berhasil dihapus.');
    }
}
