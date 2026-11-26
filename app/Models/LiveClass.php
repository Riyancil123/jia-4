<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a scheduled Live Zoom session displayed on the Beranda page.
 */
class LiveClass extends Model
{
    use HasFactory;

    public const BADGE_COLORS = [
        'rose' => 'Merah (Live Hari Ini)',
        'amber' => 'Kuning (Besok)',
        'purple' => 'Ungu (Mendatang)',
    ];

    protected $fillable = [
        'day_badge',
        'badge_color',
        'time_label',
        'title',
        'mentor_name',
        'quota_label',
        'cta_label',
        'cta_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
