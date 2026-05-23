<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class AddGoogleDriveTest extends Command
{
    protected $signature = 'test:gdrive {url}';
    
    public function handle()
    {
        $url = $this->argument('url');
        
        // Extract file ID from Google Drive URL
        preg_match('/\/d\/([^\/]+)/', $url, $matches);
        
        if (isset($matches[1])) {
            $fileId = $matches[1];
            $embedUrl = 'https://drive.google.com/uc?export=view&id=' . $fileId;
            
            $this->info("File ID: $fileId");
            $this->info("Embed URL: $embedUrl");
            
            // Create or update a test project
            $project = Project::create([
                'title' => 'Google Drive Test',
                'description' => 'Testing Google Drive image',
                'cover_image' => $url,
                'is_reels' => true,
                'is_featured' => true,
                'category_id' => 1,
            ]);
            
            $this->info("Created project ID: {$project->id}");
        } else {
            $this->error("Invalid Google Drive URL");
        }
    }
}