<?php

namespace App\Repositories\Edaphologies\Traits;

use App\Repositories\Plots\Plot;

trait EdaphologiesRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
    // public function profile()
    // {
    //     return $this->hasOne(Profile::class);
    // }
}
