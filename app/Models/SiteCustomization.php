<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteCustomization extends Model
{
    protected $fillable = ['key', 'value', 'type', 'group', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->where('is_active', true)->first();
        
        if (!$setting) {
            return $default;
        }

        return match ($setting->type) {
            'boolean' => $setting->value === '1' || $setting->value === 'true',
            'number' => is_numeric($setting->value) ? (int)$setting->value : $setting->value,
            'json' => json_decode($setting->value, true),
            'array' => json_decode($setting->value, true) ?? [],
            default => $setting->value,
        };
    }

    public static function getGroup(string $group): array
    {
        return static::where('group', $group)
            ->where('is_active', true)
            ->pluck('value', 'key')
            ->toArray();
    }

    public static function set(string $key, mixed $value, string $type = 'text', string $group = 'general'): void
    {
        $stringValue = is_array($value) ? json_encode($value) : (string)$value;
        
        static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $stringValue,
                'type' => $type,
                'group' => $group,
                'is_active' => true,
            ]
        );
    }

    public static function allSettings(): array
    {
        return static::where('is_active', true)->pluck('value', 'key')->toArray();
    }
}