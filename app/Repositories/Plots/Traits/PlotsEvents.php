<?php

namespace App\Repositories\Plots\Traits;

use App\Jobs\Geolocation;

trait PlotsEvents {

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $job = Geolocation::dispatch($model, $request = request());
        });
    }
}
