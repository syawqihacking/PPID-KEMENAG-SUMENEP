<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Document;

class PublicController extends Controller
{
    public function home()
    {
        $latestNews = News::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('latestNews'));
    }

    public function ppidInfo(Request $request)
    {
        $query = Document::query();
        
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $documents = $query->paginate(9);
        return view('documents.index', compact('documents'));
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $relatedNews = News::where('id', '!=', $news->id)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
                            
        return view('news.show', compact('news', 'relatedNews'));
    }
}
