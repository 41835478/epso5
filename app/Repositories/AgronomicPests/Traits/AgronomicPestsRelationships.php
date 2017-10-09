<?php

namespace App\Repositories\AgronomicPests\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\Crops\Crop;
use App\Repositories\Plots\Plot;
use App\Repositories\Users\User;

trait AgronomicPestsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
