<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a learning concept module displayed in the Materi Belajar explorer.
 */
class LearningMaterial extends Model
{
    use HasFactory;

    public const SUBJECTS = [
        'matematika' => 'Matematika & Penalaran Numerik',
        'indonesia' => 'Bahasa Indonesia & Literasi Teks',
        'sains' => 'Sains & IPA Terpadu (Fisika-Biologi)',
        'utbk' => 'Penalaran Logis & Analitik',
    ];

    public const LEVELS = [
        'smp' => 'SMP / MTs',
        'sma' => 'SMA / MA',
        'utbk' => 'Penalaran / UTBK',
    ];

    protected $fillable = [
        'subject',
        'level_tag',
        'badge',
        'title',
        'description',
        'video_count',
        'quiz_count',
        'difficulty_label',
        'cta_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
