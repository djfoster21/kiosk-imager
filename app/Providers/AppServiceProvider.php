<?php

namespace App\Providers;

use App\View\Composers\ImagesComposer;
use Illuminate\Support\Facades\View;
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
        View::composer('components.images.images', ImagesComposer::class);
        View::composer('components.images.slideshow', ImagesComposer::class);
    }
}
