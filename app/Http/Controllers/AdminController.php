<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $newsCount = \App\Models\News::count();
        $docsCount = \App\Models\Document::count();
        $requestsCount = \App\Models\InformationRequest::count();
        $pendingRequests = \App\Models\InformationRequest::where('status', 'pending')->count();
        $recentNews = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();
        $recentRequests = \App\Models\InformationRequest::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact('newsCount', 'docsCount', 'requestsCount', 'pendingRequests', 'recentNews', 'recentRequests'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
    public function updateGeneralSettings(Request $request)
    {
        $settings = $request->except(['_token', '_method']);
        
        foreach ($settings as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }

    public function reviews()
    {
        $reviews = \App\Models\Review::orderBy('created_at', 'desc')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approveReview(\App\Models\Review $review)
    {
        $review->update(['is_approved' => true]);
        return back()->with('success', 'Ulasan telah disetujui dan akan tampil di publik.');
    }

    public function deleteReview(\App\Models\Review $review)
    {
        $review->delete();
        return back()->with('success', 'Ulasan telah dihapus.');
    }
}
