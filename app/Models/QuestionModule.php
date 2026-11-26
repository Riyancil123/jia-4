<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a HOTS question bank module displayed on the Bank Soal page.
 */
class QuestionModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_badge',
        'hots_level',
        'title',
        'description',
        'question_count',
        'duration_minutes',
        'cta_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
