<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a promo voucher code that can be validated on the Paket Bimbingan page.
 */
class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_label',
        'description',
        'is_active',
        'expires_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'expires_at' => 'date',
    ];
}
