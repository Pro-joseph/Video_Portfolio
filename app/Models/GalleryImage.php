<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    protected $fillable = ['client_id', 'image_path', 'caption', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    protected static function booted(): void
    {
        static::deleting(function ($image) {
            if ($image->image_path && str_starts_with($image->image_path, 'gallery/')) {
                Storage::disk('public')->delete($image->image_path);
            }
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image_path) {
            return null;
        }

        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        return asset('storage/' . $this->image_path);
    }
}