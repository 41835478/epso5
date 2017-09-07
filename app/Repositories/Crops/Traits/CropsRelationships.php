<?php

namespace App\Repositories\Crops\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\CropVarieties\CropVariety;

trait CropsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function crop()
    {
        return $this->belongsToMany(Client::class);
    }

    public function crop_variety()
    {
        return $this->hasMany(CropVariety::class);
    }
}
