<?php

namespace App\Repositories\Crops\Traits;

use App\Repositories\CropVarieties\CropVariety;

trait CropsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function cropVariety()
    {
        return $this->hasMany(CropVariety::class);
    }
}
