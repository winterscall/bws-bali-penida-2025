<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DigitalMedia extends Model
{
    use HasUlids;

    protected function coverUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return $attributes['cover_path'] ? Storage::disk('public')->url($attributes['cover_path']) : null;
            },
        );
    }

    protected function attachUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if($attributes['type'] === 'attachment') {
                    return Storage::disk('public')->url($attributes['attachment_path']);
                }
                else if($attributes['type'] === 'url') {
                    return $attributes['media_url'];
                }
                else {
                    return Storage::disk('public')->url($attributes['cover_path']);
                }
            },
        );
    }
}
