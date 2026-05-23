<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'cover_image',
        'is_featured',
        'is_reels',
    ];

    public function media()
    {
        return $this->hasMany(Media::class)->orderBy('order');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function coverImageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->cover_image) {
                    return null;
                }
                // Google Drive
                if (str_contains($this->cover_image, 'drive.google.com/file/d/')) {
                    preg_match('/\/d\/([^\/]+)/', $this->cover_image, $matches);
                    if (isset($matches[1])) {
                        return 'https://drive.google.com/uc?export=view&id=' . $matches[1];
                    }
                }
                // Full URL
                if (str_starts_with($this->cover_image, 'http')) {
                    return $this->cover_image;
                }
                // Storage path
                if (!str_starts_with($this->cover_image, '/')) {
                    return asset('storage/' . $this->cover_image);
                }
                // Asset path
                return asset($this->cover_image);
            },
        );
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => trim($value),
        );
    }
}
