<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a tutoring package or printed/school program offered by Jia Learning.
 */
class Program extends Model
{
    use HasFactory;

    public const CATEGORIES = [
        'modul_sekolah' => 'Modul Cetak & Program Sekolah',
        'bimbingan_ujian' => 'Program Bimbingan Persiapan Ujian',
    ];

    protected $fillable = [
        'title',
        'slug',
        'category',
        'badge_text',
        'icon',
        'duration_label',
        'price_label',
        'description',
        'features',
        'cta_label',
        'cta_url',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
