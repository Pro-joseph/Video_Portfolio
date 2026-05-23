<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MoveProjectImagesToPublic extends Command
{
    protected $signature = 'projects:move-images';
    
    public function handle()
    {
        $projects = Project::whereNotNull('cover_image')->get();
        $moved = 0;
        $failed = 0;

        foreach ($projects as $project) {
            $path = $project->cover_image;
            
            // Skip if already a full URL (Google Drive, etc.)
            if (str_starts_with($path, 'http')) {
                $this->line("ID {$project->id}: Skipped (external URL)");
                continue;
            }

            // Check if exists in private storage
            if (Storage::disk('local')->exists($path)) {
                // Get the filename
                $filename = basename($path);
                
                // Ensure public/projects directory exists
                if (!Storage::disk('public')->exists('projects')) {
                    Storage::disk('public')->makeDirectory('projects');
                }
                
                // Copy file to public
                $content = Storage::disk('local')->get($path);
                Storage::disk('public')->put('projects/' . $filename, $content);
                
                // Update database path (just the filename)
                $project->update(['cover_image' => 'projects/' . $filename]);
                
                $this->info("ID {$project->id}: Moved {$filename}");
                $moved++;
            } elseif (Storage::disk('public')->exists($path)) {
                $this->line("ID {$project->id}: Already in public");
            } else {
                $this->warn("ID {$project->id}: File not found - {$path}");
                $failed++;
            }
        }

        $this->newLine();
        $this->info("Done! Moved: {$moved}, Failed: {$failed}");
    }
}