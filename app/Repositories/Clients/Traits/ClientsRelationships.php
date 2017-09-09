<?php

namespace App\Repositories\Clients\Traits;

use App\Repositories\Configs\Config;
use App\Repositories\Crops\Crop;
use App\Repositories\Irrigations\Irrigation;
use App\Repositories\Plots\Plot;
use App\Repositories\Regions\Region;
use App\Repositories\Trainings\Training;
use App\Repositories\Users\User;

trait ClientsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function config()
    {
        return $this->belongsToMany(Config::class);
    }

    public function crop()
    {
        return $this->belongsToMany(Crop::class);
    }

    public function irrigation()
    {
        return $this->belongsToMany(Irrigation::class);
    }

    public function plot()
    {
        return $this->hasOne(Plot::class);
    }

    public function training()
    {
        return $this->belongsToMany(Training::class);
    }

    public function region()
    {
        return $this->belongsToMany(Region::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
