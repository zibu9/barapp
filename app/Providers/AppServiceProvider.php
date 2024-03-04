<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role->id == 1;
        });

        Blade::if('manager', function () {
            return auth()->check() && auth()->user()->role->id == 2;
        });
    }
}
