<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Stores configurable key-value site settings for Jia Learning CMS.
 */
class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'group',
        'label',
        'type',
        'value',
    ];

    /**
     * Retrieve all settings keyed by setting key as a flat associative array.
     *
     * @return array<string, string|null>
     */
    public static function allAsMap(): array
    {
        return static::query()->pluck('value', 'key')->toArray();
    }
}
