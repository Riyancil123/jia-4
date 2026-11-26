<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Shared utility helpers for CMS input normalization, unique slugs, and image uploads.
 */
class CmsHelper
{
    /**
     * Split a newline-delimited textarea string into trimmed non-empty lines.
     *
     * @return array<int, string>
     */
    public static function parseLines(?string $raw): array
    {
        if ($raw === null || trim($raw) === '') {
            return [];
        }

        return array_values(array_filter(
            array_map('trim', preg_split('/\r\n|\r|\n/', $raw) ?: []),
            fn (string $line): bool => $line !== ''
        ));
    }

    /**
     * Generate a unique slug for the given Eloquent model class.
     *
     * @param  class-string<Model>  $modelClass
     */
    public static function uniqueSlug(string $modelClass, string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source) ?: 'item';
        $slug = $base;
        $counter = 2;

        while (
            $modelClass::query()
                ->where('slug', $slug)
                ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Store an uploaded image under public/uploads/{folder} and return its relative public path.
     */
    public static function storePublicImage(UploadedFile $file, string $folder): string
    {
        $targetDir = public_path('uploads/' . trim($folder, '/'));
        if (! File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $extension = $file->getClientOriginalExtension() ?: 'jpg';
        $filename = Str::uuid()->toString() . '.' . strtolower($extension);
        $file->move($targetDir, $filename);

        return 'uploads/' . trim($folder, '/') . '/' . $filename;
    }
}
