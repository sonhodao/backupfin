<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Artisan;
use Cache;
use DB;
use Spatie\ResponseCache\Facades\ResponseCache;

class SysController extends Controller
{
    public function clearCache()
    {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Cache::flush();
        ResponseCache::clear();

        // cache files
        if (config('app.env') != 'local') {
            Artisan::call('config:cache');
            //  Artisan::call('route:cache');
            Artisan::call('view:cache');
            //Artisan::call('optimize');
        }


        return "Cache is cleared";
    }
    public function info()
    {
        phpinfo();
    }

    public function updateData()
    {

    }
}
