<?php

namespace App\Repositories\CropVarieties\Traits;

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
}
