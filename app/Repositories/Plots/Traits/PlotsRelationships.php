<?php

namespace App\Repositories\Plots\Traits;

use App\Repositories\Cities\City;
use App\Repositories\Clients\Client;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Crops\Crop;
use App\Repositories\Geolocations\Geolocation;
use App\Repositories\Regions\Region;

trait PlotsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
   public function city()
   {
       return $this->belongsTo(City::class);
   }

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

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
