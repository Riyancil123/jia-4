<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a Rockstar Mentor / Teacher profile displayed across Jia Learning pages.
 */
class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'campus',
        'avatar_emoji',
        'photo',
        'quote',
        'achievements',
        'show_on_beranda',
        'show_on_materi',
        'show_on_blog',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'achievements' => 'array',
        'show_on_beranda' => 'boolean',
        'show_on_materi' => 'boolean',
        'show_on_blog' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function photoUrl(): string
    {
        if (! $this->photo) {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=e2cbf6&color=6c5857&size=300&bold=true';
        }

        if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://')) {
            return $this->photo;
        }

        if (str_starts_with($this->photo, 'images/') || str_starts_with($this->photo, 'uploads/')) {
            return asset($this->photo);
        }

        return asset('images/' . $this->photo);
    }
}
