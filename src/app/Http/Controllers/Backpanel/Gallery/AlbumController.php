<?php

namespace App\Http\Controllers\Backpanel\Gallery;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\Gallery\GalleryAlbum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GalleryAlbum::orderBy('created_at', 'desc')->get();

        return view('backpanel.pages.gallery.albums.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.pages.gallery.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $album = new GalleryAlbum();
        $album->name = $validatedData['name'];
        $album->description = $validatedData['description'];
        $album->save();

        SessionHelper::common_flasher('create', 'Album Galeri');
        return redirect()->route('backpanel.albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = GalleryAlbum::findOrFail($id);
        $photos = $album->media()
            ->where('type', 'photo')
            ->get();
        $videos = $album->media()
            ->where('type', 'video')
            ->get();

        return view('backpanel.pages.gallery.albums.show', compact('album', 'photos', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = GalleryAlbum::findOrFail($id);

        return view('backpanel.pages.gallery.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $album = GalleryAlbum::findOrFail($id);
        $album->name = $validatedData['name'];
        $album->description = $validatedData['description'];
        $album->save();

        SessionHelper::common_flasher('update', 'Album Galeri');
        return redirect()->route('backpanel.albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = GalleryAlbum::findOrFail($id);
        $album->delete();

        SessionHelper::common_flasher('delete', 'Album Galeri');
        return redirect()->route('backpanel.albums.index');
    }

    // edit content
    public function publish(GalleryAlbum $album)
    {
        return view('backpanel.pages.gallery.albums.publish', compact('album'));
    }

    public function update_publish(Request $request, GalleryAlbum $album)
    {
        $validatedData = $request->validate([
            'published_at' => 'required|date_format:d/m/Y',
        ]);

        $album->published_at = Carbon::createFromFormat('d/m/Y', $validatedData['published_at']);
        $album->save();

        SessionHelper::common_flasher('update', 'Publish Album');
        return redirect()->route('backpanel.albums.show', ['album' => $album]);
    }

     public function unpublish(GalleryAlbum $album)
    {
        $album->published_at = null;
        $album->save();

        SessionHelper::common_flasher('update', 'Unpublish Album');
        return redirect()->route('backpanel.albums.show', ['album' => $album]);
    }
}
