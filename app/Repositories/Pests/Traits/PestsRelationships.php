<?php

namespace App\Repositories\Pests\Traits;

use App\Repositories\Crops\Crop;

trait PestsRelationships {

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
