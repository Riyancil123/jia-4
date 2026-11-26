<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a student or parent testimonial displayed on the Beranda page.
 */
class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'quote',
        'rating',
        'avatar_initial',
        'is_highlighted',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_highlighted' => 'boolean',
        'is_active' => 'boolean',
    ];
}
