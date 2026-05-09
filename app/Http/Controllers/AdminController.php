<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $newsCount = \App\Models\News::count();
        $docsCount = \App\Models\Document::count();
        $requestsCount = \App\Models\InformationRequest::count();
        $recentNews = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact('newsCount', 'docsCount', 'requestsCount', 'recentNews'));
    }
}
