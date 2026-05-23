<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Wedding Highlights 2024',
            'description' => 'A beautiful wedding ceremony highlights reel.',
            'category_id' => 1,
            'cover_image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80',
            'is_featured' => true,
            'is_reels' => true,
        ]);

        Project::create([
            'title' => 'Corporate Brand Video',
            'description' => 'Professional corporate video for tech startup.',
            'category_id' => 2,
            'cover_image' => 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=600&q=80',
            'is_featured' => true,
            'is_reels' => false,
        ]);
    }
}