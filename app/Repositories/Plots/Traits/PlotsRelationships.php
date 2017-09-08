<?php

namespace App\Repositories\Plots\Traits;

use App\Repositories\Geolocations\Geolocation;

trait PlotsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function geolocation()
    {
        return $this->hasOne(Geolocation::class);
    }
}
