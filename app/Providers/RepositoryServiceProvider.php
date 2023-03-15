<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\PostInterface',
            'App\Http\Repositories\PostRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\CarouselInterface',
            'App\Http\Repositories\CarouselRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
