<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\MetryService;

class MetryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('metry', function ($app) {
            return new MetryService();
        });
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
