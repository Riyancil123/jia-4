<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a frequently asked question grouped by page section.
 */
class Faq extends Model
{
    use HasFactory;

    public const SECTIONS = [
        'adaptive-test' => 'Jia Adaptive Test',
        'bank-soal' => 'Bank Soal HOTS',
        'materi-belajar' => 'Materi Belajar',
        'panduan' => 'Pusat Panduan Utama',
        'panduan-simulasi' => 'Panduan Simulasi & FAQ',
    ];

    protected $fillable = [
        'section',
        'question',
        'answer',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
