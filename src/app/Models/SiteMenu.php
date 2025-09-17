<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteMenu extends Model
{
    use HasUlids;

    public static $TYPES = [
        'layanan' => 'Layanan',
        'informasi_publik' => 'Informasi Publik',
    ];

    public static $LINK_TYPES = [
        'linkless' => 'Tanpa Link',
        'external_url' => 'External URL',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(SiteMenu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(SiteMenu::class, 'parent_id');
    }
}