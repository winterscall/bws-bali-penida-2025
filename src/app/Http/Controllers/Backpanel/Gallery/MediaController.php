<?php

namespace App\Http\Controllers\Backpanel\Gallery;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\Gallery\GalleryAlbum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, GalleryAlbum $album)
    {
        $type = $request->query('type', 'photo');

        return view('backpanel.pages.gallery.albums.create', compact('album', 'type'));
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
}
