<?php

namespace App\Repositories\Users\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\Plots\Plot;
use App\Repositories\Profiles\Profile;

trait UsersRelationships {
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function plot()
    {
        return $this->hasMany(Plot::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}