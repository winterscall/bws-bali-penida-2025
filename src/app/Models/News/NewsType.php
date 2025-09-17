<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
