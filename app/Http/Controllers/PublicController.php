<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Document;
use App\Models\InformationRequest;
use App\Models\Setting;
use App\Models\Faq;
use App\Models\PublicInformation;
use App\Models\Review;

class PublicController extends Controller
{
    public function home()
    {
        $latestNews = News::latest()->take(3)->get();
        $latestDocs = Document::latest()->take(6)->get();
        $latestReviews = Review::where('is_approved', true)->latest()->take(5)->get();
        
        $stats = [
            'total_requests' => InformationRequest::count(),
            'completed_requests' => InformationRequest::where('status', 'Selesai')->count(),
            'total_documents' => Document::count(),
            'avg_rating' => Review::where('is_approved', true)->avg('rating') ?? 0,
        ];

        return view('home', compact('latestNews', 'latestDocs', 'latestReviews', 'stats'));
    }

    public function profil()
    {
        $settings = Setting::where('group', 'profil')->pluck('value', 'key');
        return view('pages.profil', compact('settings'));
    }

    public function prosedur()
    {
        $settings = Setting::where('group', 'prosedur')->pluck('value', 'key');
        return view('pages.prosedur', compact('settings'));
    }

    public function kontak()
    {
        $settings = Setting::where('group', 'kontak')->pluck('value', 'key');
        return view('pages.kontak', compact('settings'));
    }

    public function faq()
    {
        $faqs = Faq::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('pages.faq', compact('faqs'));
    }

    public function statistik()
    {
        $totalRequests = InformationRequest::count();
        $approvedRequests = InformationRequest::where('status', 'approved')->count();
        $pendingRequests = InformationRequest::where('status', 'pending')->count();
        $rejectedRequests = InformationRequest::where('status', 'rejected')->count();
        $totalNews = News::count();
        $totalDocuments = Document::count();

        return view('pages.statistik', compact(
            'totalRequests', 'approvedRequests', 'pendingRequests', 'rejectedRequests',
            'totalNews', 'totalDocuments'
        ));
    }

    public function dip()
    {
        $dips = PublicInformation::where('is_active', true)->orderBy('order')->get()->groupBy('type');
        return view('pages.dip', compact('dips'));
    }

    public function reviews()
    {
        $reviews = Review::where('is_approved', true)->orderBy('created_at', 'desc')->get();
        $averageRating = Review::where('is_approved', true)->avg('rating');
        $totalReviews = $reviews->count();
        
        return view('pages.reviews', compact('reviews', 'averageRating', 'totalReviews'));
    }

    public function submitReview(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5',
        ]);

        Review::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => true, // Auto-approve
        ]);

        return back()->with('success', 'Terima kasih atas ulasan Anda! Ulasan Anda telah dipublikasikan.');
    }

    public function ppidInfo(Request $request)
    {
        $query = Document::query();
        
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        $documents = $query->latest()->get();
        $categories = Document::distinct()->pluck('category');
        
        return view('documents.index', compact('documents', 'categories'));
    }

    public function indexNews(Request $request)
    {
        $query = News::query();
        
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        $news = $query->latest()->paginate(9);
        $categories = News::distinct()->pluck('category');
        
        return view('news.index', compact('news', 'categories'));
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

        $infoRequest = InformationRequest::create($validated);

        return redirect()->route('requests.success', ['id' => $infoRequest->id]);
    }

    public function success($id)
    {
        $request = InformationRequest::findOrFail($id);
        return view('requests.success', compact('request'));
    }

    public function receipt($id)
    {
        $request = InformationRequest::findOrFail($id);
        return view('requests.receipt', compact('request'));
    }

    public function trackRequest(Request $request)
    {
        $email = $request->get('email');
        $requests = null;

        if ($email) {
            $requests = InformationRequest::where('email', $email)
                            ->orderBy('created_at', 'desc')
                            ->get();
        }

        return view('requests.track', compact('requests', 'email'));
    }

    public function search(Request $request)
    {
        $q = $request->get('q', '');
        $news = collect();
        $documents = collect();

        if (strlen($q) >= 2) {
            $news = News::where('title', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%")
                        ->orderBy('published_at', 'desc')
                        ->take(10)
                        ->get();

            $documents = Document::where('title', 'like', "%{$q}%")
                                ->orWhere('description', 'like', "%{$q}%")
                                ->orderBy('created_at', 'desc')
                                ->take(10)
                                ->get();
        }

        return view('pages.search', compact('q', 'news', 'documents'));
    }
}
