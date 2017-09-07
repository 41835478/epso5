<?php

namespace App\Repositories\Regions\Traits;

use App\Repositories\Cities\City;
use App\Repositories\Clients\Client;
use App\Repositories\Countries\Country;
use App\Repositories\States\State;

trait RegionsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function client()
    {
        return $this->belongsToMany(Client::class);
    }
}
