<?php

namespace App\Repositories\Patterns\Traits;

use App\Repositories\Crops\Crop;

trait PatternsRelationships {

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
