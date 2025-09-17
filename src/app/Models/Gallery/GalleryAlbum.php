<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasUlids;

    // cast
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function media()
    {
        return $this->hasMany(GalleryMedia::class, 'gallery_album_id');
    }
}
