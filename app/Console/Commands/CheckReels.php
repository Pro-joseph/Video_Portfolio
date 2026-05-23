<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class CheckReels extends Command
{
    protected $signature = 'check:reels';
    
    public function handle()
    {
        $reels = Project::where('is_reels', true)->with('media')->get();
        
        $this->info("Found {$reels->count()} reels:");
        
        foreach ($reels as $reel) {
            $this->info("ID: {$reel->id}, Title: {$reel->title}, Cover: " . ($reel->cover_image ?? 'null'));
            $this->info("Media count: " . $reel->media->count());
            foreach ($reel->media as $media) {
                $this->info("  - URL: " . ($media->video_url ?? 'null') . ", Type: " . ($media->type ?? 'null'));
            }
        }
    }
}