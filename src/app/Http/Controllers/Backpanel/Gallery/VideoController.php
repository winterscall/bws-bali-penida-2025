<?php

namespace App\Http\Controllers\Backpanel\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery\GalleryAlbum;
use App\Models\Gallery\GalleryMedia;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(GalleryAlbum $album)
    {
        return view('backpanel.pages.gallery.videos.create', [
            'album' => $album,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, GalleryAlbum $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $video = new GalleryMedia();
        $video->gallery_album_id = $album->id;
        $video->name = $request->input('name');
        $video->type = 'video';
        $video->path = $request->input('url');
        $video->save();

        return redirect()->route('backpanel.albums.show', ['album' => $album])->with('success', 'Video berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryMedia $video, GalleryAlbum $album)
    {
        return view('backpanel.pages.gallery.videos.edit', [
            'video' => $video,
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryAlbum $album, GalleryMedia $video)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $video->name = $request->input('name');
        $video->path = $request->input('url');
        $video->save();

        return redirect()->route('backpanel.albums.show', ['album' => $album])->with('success', 'Video berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryMedia $video, GalleryAlbum $album)
    {
        $video->delete();

        return redirect()->route('backpanel.albums.show', ['album' => $album])->with('success', 'Video berhasil dihapus.');
    }
}
