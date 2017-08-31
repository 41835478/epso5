<?php

namespace App\Services\Html;

use Illuminate\Support\ServiceProvider;

class HtmlProvider extends ServiceProvider
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
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('HtmlProvider', function()
        {
            return new \App\Services\Html\HtmlClass;
        });
    }
}
