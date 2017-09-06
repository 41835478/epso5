<?php

namespace App\Repositories\CropVarieties\Traits;

use App\Repositories\CropVarietyTypes\CropVarietyType;
use App\Repositories\Crops\Crop;

trait CropVarietiesRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function crop()
    {
       return $this->belongsTo(Crop::class);
    }

    public function crop_variety_type()
    {
       return $this->belongsTo(CropVarietyType::class, 'crop_variety_type', 'crop_variety_type_code');
    }
}
