<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->where('is_visible', true)->first();
        return $setting?->value ?? $default;
    }

    public static function getGroup(string $group): array
    {
        return static::where('group', $group)->where('is_visible', true)->pluck('value', 'key')->toArray();
    }
}