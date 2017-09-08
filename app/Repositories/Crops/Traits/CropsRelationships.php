<?php

namespace App\Repositories\Crops\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Pests\Pest;
use App\Repositories\Plots\Plot;

trait CropsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function client()
    {
        return $this->belongsToMany(Client::class);
    }

    public function crop_variety()
    {
        return $this->hasMany(CropVariety::class);
    }

    public function pattern()
    {
        return $this->hasMany(Pattern::class);
    }
    
    public function pest()
    {
        return $this->hasMany(Pest::class);
    }

    public function plot()
    {
        return $this->hasOne(Plot::class);
    }
}
