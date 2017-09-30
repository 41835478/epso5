<?php

namespace App\Repositories\Edaphologies\Traits;

use App\Repositories\Crops\Crop;
use App\Repositories\Plots\Plot;

trait EdaphologiesRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}
