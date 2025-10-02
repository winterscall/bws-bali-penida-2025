<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryMedia extends Model
{
    use HasUlids;

    protected function thumbUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if($attributes['type'] == 'video'){
                    return 'https://img.youtube.com/vi/'.explode('v=', $attributes['path'])[1].'/hqdefault.jpg';
                }

                if ($attributes['path']) {
                    $pathInfo = pathinfo($attributes['path']);
                    $thumbnailPath = 'gallery/thumbs/thumb-' . $pathInfo['basename'];
                    
                    // Check if thumbnail exists, otherwise use original
                    if (Storage::disk('public')->exists($thumbnailPath)) {
                        return asset('storage/' . $thumbnailPath);
                    }
                    return asset('storage/' . $attributes['path']);
                }
                
                return null;
            },
        );
    }

    protected function pathUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if($attributes['type'] == 'video'){
                    return $attributes['path'] ?? null;
                }
                return $attributes['path'] ? asset('storage/' . $attributes['path']) : null;
            },
        );
    }

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }
}
