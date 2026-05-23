<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class CheckProjectImages extends Command
{
    protected $signature = 'check:project-images';
    
    public function handle()
    {
        $projects = Project::latest()->take(10)->get(['id', 'title', 'cover_image']);
        
        foreach ($projects as $p) {
            $this->info("ID {$p->id}: {$p->title}");
            $this->info("  Cover: " . ($p->cover_image ?? 'NULL'));
            $this->info("  URL: " . ($p->coverImageUrl ?? 'NULL'));
        }
    }
}