<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    use HasUlids;

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
