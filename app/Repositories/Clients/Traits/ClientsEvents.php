<?php

namespace App\Repositories\Clients\Traits;

use Cache;

trait ClientsEvents {

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            Cache::forget('cache-client-' . $model->id);
        });
    }
}
