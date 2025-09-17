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

                $path_explode = explode('img', $attributes['path']);
                return $attributes['path'] ? Storage::url($path_explode[0].'thumb-img'.$path_explode[1]) : null;
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
                return $attributes['path'] ? Storage::url($attributes['path']) : null;
            },
        );
    }

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }
}
