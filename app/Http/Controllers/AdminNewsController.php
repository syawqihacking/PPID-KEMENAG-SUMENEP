<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = \App\Models\News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:5120',
        ]);

        $news = new \App\Models\News();
        $news->title = $validated['title'];
        $news->slug = \Illuminate\Support\Str::slug($validated['title']);
        $news->content = $validated['content'];
        $news->category = $validated['category'];
        $news->author_name = 'Admin Portal'; // Default author
        $news->published_at = now();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $news->image_path = '/storage/' . $path;
        } else {
            $news->image_path = 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?auto=format&fit=crop&q=80&w=800'; // Default
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'News created successfully');
    }

    public function edit(\App\Models\News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, \App\Models\News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:5120',
        ]);

        $news->title = $validated['title'];
        $news->slug = \Illuminate\Support\Str::slug($validated['title']);
        $news->content = $validated['content'];
        $news->category = $validated['category'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $news->image_path = '/storage/' . $path;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
    }

    public function destroy(\App\Models\News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully');
    }
}
