<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application repositories.
     *
     * @return void
     */
    public function register()
    {
        /** Services */
        $this->app->bind('App\Services\Icons\IconsInterface', 'App\Services\Icons\Fonts\Awesome\IconBuilder');
    }
}
