<?php

namespace App\Repositories\Plots\Traits;

use App\Repositories\Cities\City;
use App\Repositories\Clients\Client;
use App\Repositories\Countries\Country;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Crops\Crop;
use App\Repositories\Geolocations\Geolocation;
use App\Repositories\Regions\Region;
use App\Repositories\States\State;
use App\Repositories\Users\User;

trait PlotsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
   public function city()
   {
       return $this->belongsTo(City::class)->withTrashed();
   }

    public function client()
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class)->withTrashed();
    }

    public function crop_variety()
    {
        return $this->belongsTo(CropVariety::class)->withTrashed();
    }

    public function geolocation()
    {
        return $this->hasOne(Geolocation::class)->withTrashed();
    }

    public function region()
    {
        return $this->belongsTo(Region::class)->withTrashed();
    }

    public function state()
    {
        return $this->belongsTo(State::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
