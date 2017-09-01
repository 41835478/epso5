<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
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
        // foreach (glob(app_path().'/Http/Macros/*.php') as $file){
        //     require_once($file);
        // }
    }
}