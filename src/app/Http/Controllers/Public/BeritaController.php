<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsType;

class BeritaController extends Controller
{
    public function index(string $slug)
    {
        $news_type = NewsType::where('slug', $slug)->firstOrFail();
        $beritas = News::where('news_type_id', $news_type->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('public.pages.berita', compact('news_type', 'beritas'));
    }

    public function show(string $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('public.pages.berita-detail', compact('news'));
    }
}