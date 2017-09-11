<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->app['validator']->extend('checkboxUnique', function ($attribute, $value, $parameters)
        {
            $status = 0;
            foreach ($value as $item) {
                $status++;
            }
            return ($status == 1) ? true : false;
        });
    }

    public function register()
    {
        //
    }
}