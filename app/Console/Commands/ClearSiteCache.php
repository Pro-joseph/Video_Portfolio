<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearSiteCache extends Command
{
    protected $signature = 'cache:clear-site';
    protected $description = 'Clear all application caches';

    public function handle()
    {
        Cache::flush();
        
        $this->info('Site cache cleared successfully!');
        
        return Command::SUCCESS;
    }
}