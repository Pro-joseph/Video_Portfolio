<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class GoogleDriveTestSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test project with Google Drive image
        Project::create([
            'title' => 'Google Drive Test',
            'description' => 'Testing Google Drive image display',
            'cover_image' => 'https://drive.google.com/file/d/1SVhngiViq2oqdw0ElHQb27NrdDlMvSpj/view?usp=sharing',
            'is_reels' => true,
            'is_featured' => true,
            'category_id' => 1,
        ]);
    }
}