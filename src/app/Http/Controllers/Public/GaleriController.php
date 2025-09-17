<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery\GalleryAlbum;
use App\Models\Gallery\GalleryMedia;

class GaleriController extends Controller
{
    public function foto()
    {
        $albums = GalleryAlbum::with(['media' => function ($query) {
                $query->where('type', 'photo');
            }])
            ->whereHas('media', function ($query) {
                $query->where('type', 'photo');
            })
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('public.pages.galeri-foto', compact('albums'));
    }

    public function foto_detail(GalleryAlbum $album)
    {
        $photos = $album->media()
            ->where('type', 'photo')
            ->get();
        return view('public.pages.galeri-foto-detail', compact('album', 'photos'));
    }

    public function video()
    {
        $videos = GalleryMedia::where('type', 'video')
            ->whereHas('album', function ($query) {
                $query->whereNotNull('published_at');
            })
            ->get();
        return view('public.pages.galeri-video', compact('videos'));
    }
}
