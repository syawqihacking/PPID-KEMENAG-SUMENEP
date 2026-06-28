<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    /**
     * GET /api/news
     * List all published news with pagination.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $category = $request->query('category');

        $query = News::where('is_published', true)->orderBy('published_at', 'desc');

        if ($category) {
            $query->where('category', $category);
        }

        $news = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data'    => $news->items(),
            'meta'    => [
                'current_page' => $news->currentPage(),
                'last_page'    => $news->lastPage(),
                'per_page'     => $news->perPage(),
                'total'        => $news->total(),
            ],
        ]);
    }

    /**
     * GET /api/news/{id}
     * Show a single news item.
     */
    public function show(string $id)
    {
        $news = News::find($id);

        if (!$news || !$news->is_published) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $news,
        ]);
    }
}
