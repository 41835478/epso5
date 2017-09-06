<?php

namespace App\Repositories\CropVarietyTypes\Traits;

use App\Repositories\CropVarieties\CropVariety;


trait CropVarietyTypesRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function crop_variety()
    {
        return $this->hasMany(CropVariety::class, 'crop_variety_type', 'crop_variety_type_code');
    }
}
