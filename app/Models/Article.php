<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents an educational blog article and video showcase managed through the CMS.
 */
class Article extends Model
{
    use HasFactory;

    public const CATEGORIES = [
        'utbk' => 'Tips Seleksi SMA & TKA',
        'konsep' => 'Konsep & Teori Belajar',
        'kabar' => 'Informasi & Rilis Akademik',
    ];

    protected $fillable = [
        'title',
        'slug',
        'category',
        'category_label',
        'excerpt',
        'content',
        'author_name',
        'author_role',
        'read_time',
        'published_date_label',
        'thumbnail',
        'video_url',
        'is_featured',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function getYoutubeIdAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        $url = trim($this->video_url);

        // Raw 11-char ID
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
            return $url;
        }

        // youtu.be/{id}
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // youtube.com/watch?v={id}
        if (preg_match('/[?&]v=([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        // youtube.com/embed/{id}
        if (preg_match('/embed\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        $id = $this->youtube_id;
        return $id ? "https://www.youtube-nocookie.com/embed/{$id}?autoplay=1" : null;
    }

    public function thumbnailUrl(): string
    {
        if (!empty($this->thumbnail)) {
            $path = $this->thumbnail;
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            return asset($path);
        }

        $ytId = $this->youtube_id;
        if ($ytId) {
            return "https://i.ytimg.com/vi/{$ytId}/hqdefault.jpg";
        }

        return asset('images/video_math_tka.jpg');
    }
}
