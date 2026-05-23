<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PageSection;
use App\Models\Project;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProjectSeeder::class,
        ]);

        // Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@frameflow.com',
            'password' => Hash::make('password'),
        ]);

        // Page Sections
        PageSection::create([
            'key' => 'hero',
            'title' => 'Capturing the Light of the Souss.',
            'subtitle' => 'Framing the Flow of the Atlantic.',
            'body' => 'A geometric reconstruction of cinematic narratives within the sun-bleached concrete of New Agadir.',
        ]);

        PageSection::create([
            'key' => 'about',
            'title' => 'The eye is a construct.',
            'subtitle' => 'We re-architect the visual plane.',
            'body' => 'Agadir Modernist is not a production house; it is a laboratory for the geometric reconstruction of cinematic narratives.',
        ]);

        PageSection::create([
            'key' => 'cta',
            'title' => 'Ready to begin?',
            'subtitle' => 'Initialize your project.',
            'body' => 'Connect with our studio to start the geometric reconstruction of your vision.',
        ]);

        // Sample Packages
        Package::create([
            'name' => 'Cinematic Short',
            'description' => 'Ideal for social media highlights.',
            'price' => 499.00,
            'features' => ['1-2 minute edit', 'Color grading', '4K delivery'],
        ]);

        Package::create([
            'name' => 'Documentary Feature',
            'description' => 'A deep dive into your narrative.',
            'price' => 1499.00,
            'features' => ['10-15 minute edit', 'Full sound design', '16mm film scan option'],
        ]);
    }
}
