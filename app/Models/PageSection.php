<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PageSection extends Model
{
    protected $fillable = [
        'key',
        'title',
        'subtitle',
        'body',
        'image_path',
        'button_text',
        'button_link',
        'order',
        'is_visible',
        'extras',
    ];

    protected $casts = [
        'extras' => 'array',
        'is_visible' => 'boolean',
    ];

    public function getImageUrl(): ?string
    {
        $images = $this->getImages();
        return $images[0] ?? null;
    }

    public function getImages(): \Illuminate\Support\Collection
    {
        if (!$this->image_path) {
            return collect([]);
        }

        // Try to decode as JSON array (multiple images)
        $paths = json_decode($this->image_path, true);
        if (is_array($paths) && !empty($paths)) {
            return collect($paths)->map(fn($path) => $this->resolveImagePath($path));
        }

        // Single image
        return collect([$this->resolveImagePath($this->image_path)]);
    }

    private function resolveImagePath(string $path): string
    {
        // Google Drive
        if (str_contains($path, 'drive.google.com/file/d/')) {
            preg_match('/\/d\/([^\/]+)/', $path, $matches);
            if (isset($matches[1])) {
                return 'https://drive.google.com/uc?export=view&id=' . $matches[1];
            }
        }

        // Full URL
        if (str_starts_with($path, 'http')) {
            return $path;
        }

        // Storage path
        if (!str_starts_with($path, '/')) {
            return asset('storage/' . $path);
        }

        return asset($path);
    }

    public static function getForPage(string $page): self|null
    {
        return static::where('key', $page)->where('is_visible', true)->first();
    }
}