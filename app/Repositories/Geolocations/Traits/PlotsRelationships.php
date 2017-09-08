<?php

namespace App\Repositories\Geolocations\Traits;

use App\Repositories\Plots\Plot;

trait GeolocationsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}
