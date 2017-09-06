<?php

namespace App\Repositories\Crops\Traits;

use App\Repositories\CropVarieties\CropVariety;

trait CropsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function crop_variety()
    {
        return $this->hasMany(CropVariety::class);
    }
}
