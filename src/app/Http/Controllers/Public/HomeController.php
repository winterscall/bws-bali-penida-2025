<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DigitalMedia;
use App\Models\HeroSlider;
use App\Models\News\News;
use App\Models\SocialPost;

class HomeController extends Controller
{
    public function index()
    {
        $slider = HeroSlider::orderBy('index')->get();
        $balai = News::whereHas('news_type', function ($q) {
                $q->where('slug', 'berita-balai');
            })
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();
        $sda = News::whereHas('news_type', function ($q) {
                $q->where('slug', 'berita-sda');
            })
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();
        $social = SocialPost::orderBy('published_at', 'desc')->get();
        $digital = DigitalMedia::orderBy('created_at', 'desc')->take(10)->get();
        $video = [];

        return view('public.pages.home', compact('slider', 'balai', 'sda', 'social', 'digital', 'video'));
    }

    public function kontak()
    {
        return view('public.pages.kontak-kami');
    }

    public function tkpsda()
    {
        return view('public.pages.tkpsda');
    }
}
