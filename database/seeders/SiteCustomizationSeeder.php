<?php

namespace Database\Seeders;

use App\Models\SiteCustomization;
use Illuminate\Database\Seeder;

class SiteCustomizationSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Header
            ['key' => 'header_bg_color', 'value' => '#ffffff', 'type' => 'color', 'group' => 'header'],
            ['key' => 'header_text_color', 'value' => '#1a1a2e', 'type' => 'color', 'group' => 'header'],
            ['key' => 'header_logo_text', 'value' => 'Oumalk', 'type' => 'text', 'group' => 'header'],
            
            // Footer
            ['key' => 'footer_bg_color', 'value' => '#1a1a2e', 'type' => 'color', 'group' => 'footer'],
            ['key' => 'footer_text_color', 'value' => '#ffffff', 'type' => 'color', 'group' => 'footer'],
            ['key' => 'footer_copyright', 'value' => '© 2026 Oumalk. All rights reserved.', 'type' => 'text', 'group' => 'footer'],
            
            // Colors
            ['key' => 'primary_color', 'value' => '#1a1a2e', 'type' => 'color', 'group' => 'colors'],
            ['key' => 'secondary_color', 'value' => '#f4a460', 'type' => 'color', 'group' => 'colors'],
            ['key' => 'accent_color', 'value' => '#e8d5c4', 'type' => 'color', 'group' => 'colors'],
            
            // Social Media
            ['key' => 'social_facebook', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => '', 'type' => 'text', 'group' => 'social'],
            
            // Contact Info
            ['key' => 'contact_email', 'value' => '', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => '', 'type' => 'text', 'group' => 'contact'],
        ];

        foreach ($settings as $setting) {
            SiteCustomization::create($setting);
        }
    }
}