<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class FixReels extends Command
{
    protected $signature = 'fix:reels';
    
    public function handle()
    {
        // Fix invalid Google Drive search URLs
        $projects = Project::where('is_reels', true)->get();
        
        foreach ($projects as $project) {
            if ($project->cover_image && str_contains($project->cover_image, 'drive.google.com') && str_contains($project->cover_image, 'search?q=')) {
                $project->update(['cover_image' => null]);
                $this->info("Fixed project ID {$project->id}: removed invalid cover_image");
            }
        }
        
        $this->info("Done!");
    }
}