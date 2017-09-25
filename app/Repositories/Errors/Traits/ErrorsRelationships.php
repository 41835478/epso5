<?php

namespace App\Repositories\Errors\Traits;

use App\Repositories\Plots\Plot;

trait ErrorsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}
