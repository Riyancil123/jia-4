<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Stores newsletter subscriber emails submitted through the public blog form.
 */
class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subscribed_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
    ];
}
