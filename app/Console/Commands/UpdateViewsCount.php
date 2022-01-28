<?php

namespace App\Console\Commands;

use CyrildeWit\EloquentViewable\View;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class UpdateViewsCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'views:update';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cached = Cache::get('views_count', []);

        foreach (array_chunk($cached, 50) as $views) {
            View::insert(array_values($views));
            foreach ($views as $view) {
                $view["viewable_type"]::find($view["viewable_id"])->increment('view_count');
            }
            // Reindex cache
            Cache::put(
                'views_count',
                collect(Cache::get('views_count', []))->diffKeys($views)->toArray(),
                now()->addHour(),
            );
        }
    }
}
