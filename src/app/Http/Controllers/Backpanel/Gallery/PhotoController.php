<?php

namespace App\Http\Controllers\Backpanel\Gallery;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\Gallery\GalleryAlbum;
use App\Models\Gallery\GalleryMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PhotoController extends Controller
{
    /**
     * Handle AJAX upload for multiple files
     */
    public function upload(Request $request, GalleryAlbum $album)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        try {
            $file = $request->file('file');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store original image
            $path = $file->storeAs('gallery/images', $fileName, 'public');

            // Create thumbnail
            $this->createThumbnail($file, $fileName);

            // Create media record
            $media = new GalleryMedia();
            $media->gallery_album_id = $album->id;
            $media->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $media->type = 'photo';
            $media->path = $path;
            $media->save();

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'media' => [
                    'id' => $media->id,
                    'name' => $media->name,
                    'title' => $media->name,
                    'thumb_url' => $media->thumb_url,
                    'path_url' => $media->path_url,
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Photo upload failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryAlbum $album, GalleryMedia $photo)
    {
        // Delete files from storage
        if ($photo->type === 'photo' && $photo->path) {
            Storage::disk('public')->delete($photo->path);

            // Delete thumbnail
            $pathInfo = pathinfo($photo->path);
            $thumbnailPath = str_replace('images', 'thumbs', $pathInfo['dirname']) . '/thumb-' . $pathInfo['basename'];
            Storage::disk('public')->delete($thumbnailPath);
        }

        $photo->delete();

        SessionHelper::common_flasher('delete', 'Media');
        return redirect()->route('backpanel.albums.show', $album);
    }

    /**
     * Create thumbnail for uploaded image
     */
    private function createThumbnail($file, $fileName)
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname());
        
        // Resize to thumbnail size (300x300 max, maintaining aspect ratio)
        $image->scaleDown(width: 300, height: 300);
        
        // Save thumbnail
        $thumbnailPath = storage_path('app/public/gallery/thumbs/thumb-' . $fileName);
        
        // Create thumbs directory if it doesn't exist
        $thumbnailDir = dirname($thumbnailPath);
        if (!is_dir($thumbnailDir)) {
            mkdir($thumbnailDir, 0755, true);
        }
        
        $image->save($thumbnailPath);
    }
}
