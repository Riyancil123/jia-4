<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a platform changelog or release announcement shown on Pahami Jia.
 */
class PlatformUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'version_badge',
        'status_badge',
        'release_date_label',
        'title',
        'summary',
        'tags',
        'cta_label',
        'cta_view',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
    ];
}
