<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'logo', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    protected static function booted(): void
    {
        static::creating(function ($client) {
            if (empty($client->slug)) {
                $client->slug = Str::slug($client->name);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('order');
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (!$this->logo) {
            return null;
        }

        if (str_starts_with($this->logo, 'http')) {
            return $this->logo;
        }

        return asset('storage/' . $this->logo);
    }

    public function activeImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->where('is_active', true)->orderBy('order');
    }
}