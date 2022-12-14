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
        //
        $this->app->bind('App\Http\Interfaces\CategoryInterface','App\Http\Repositories\CategoryRepository');
        $this->app->bind('App\Http\Interfaces\ProductInterface','App\Http\Repositories\ProductRepository');
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
