<?php

namespace App\Repositories\Plots\Traits;

use App\Repositories\Geolocations\Geolocation;

trait PlotsEvents {

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($model) {
    //         //Add plot_id to request
    //         $request = array_merge(request()->all(), ['plot_id' => $model->id]);
    //         //Create the geolocation record 
    //         $geolocation = app(Geolocation::class)->create($request);
    //     });
    // }
}
