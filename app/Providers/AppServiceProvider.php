<?php

namespace App\Providers;

use App\Services\ArtworkService;
use App\Services\CategoryService;
use App\Services\WishService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArtworkService::class, function($app){
            return new ArtworkService();
        });

        $this->app->bind(WishService::class, function($app){
            return new WishService();
        });

        $this->app->bind(CategoryService::class, function($app){
            return new CategoryService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
