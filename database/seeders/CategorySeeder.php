<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Wedding', 'slug' => 'wedding', 'is_active' => true],
            ['name' => 'Commercial', 'slug' => 'commercial', 'is_active' => true],
            ['name' => 'Documentary', 'slug' => 'documentary', 'is_active' => true],
            ['name' => 'Music Video', 'slug' => 'music-video', 'is_active' => true],
            ['name' => 'Event', 'slug' => 'event', 'is_active' => true],
            ['name' => 'Corporate', 'slug' => 'corporate', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}