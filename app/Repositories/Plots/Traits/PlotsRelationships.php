<?php

namespace App\Repositories\Plots\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Crops\Crop;
use App\Repositories\Geolocations\Geolocation;

trait PlotsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

    public function crop_variety()
    {
        return $this->belongsTo(CropVariety::class);
    }

    public function geolocation()
    {
        return $this->hasOne(Geolocation::class);
    }
}
