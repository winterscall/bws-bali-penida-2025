<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasUlids;

    // casts
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function news_type()
    {
        return $this->belongsTo(NewsType::class);
    }
}
