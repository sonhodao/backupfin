<?php

namespace App\Providers;

use Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravolt\Avatar\LumenServiceProvider;
use Request;
use Schema;
use Blade;
use App\Services\VisitorService;
use CyrildeWit\EloquentViewable\Contracts\Visitor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(Visitor::class, VisitorService::class);
        $this->app->register(TelescopeServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        Blade::directive(
            'money', function ($amount,$option='') {

                $price ="
            <?php
            echo showPrice($amount,$option);
            ?>
            ";
                return $price;
            }
        );

        $this->app->resolving(
            LengthAwarePaginator::class, function ($paginator) {
                return $paginator->appends(Arr::except(Request::all(), $paginator->getPageName()));
            }
        );
    }
}
