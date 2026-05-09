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

    public function profil()
    {
        return view('pages.profil');
    }

    public function prosedur()
    {
        return view('pages.prosedur');
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

    public function indexNews()
    {
        $newsList = News::orderBy('published_at', 'desc')->paginate(9);
        return view('news.index', compact('newsList'));
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $relatedNews = News::where('id', '!=', $news->id)
                            ->orderBy('published_at', 'desc')
                            ->take(3)
                            ->get();
                            
        return view('news.show', compact('news', 'relatedNews'));
    }

    public function requestForm()
    {
        return view('requests.create');
    }

    public function submitRequest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\InformationRequest::create($validated);

        return redirect()->back()->with('success', 'Permohonan informasi Anda telah berhasil dikirim!');
    }

    public function trackRequest(Request $request)
    {
        $email = $request->get('email');
        $requests = null;

        if ($email) {
            $requests = \App\Models\InformationRequest::where('email', $email)
                            ->orderBy('created_at', 'desc')
                            ->get();
        }

        return view('requests.track', compact('requests', 'email'));
    }
}
