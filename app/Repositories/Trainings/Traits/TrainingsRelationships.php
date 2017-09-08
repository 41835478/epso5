<?php

namespace App\Repositories\Trainings\Traits;

use App\Repositories\Clients\Client;

trait TrainingsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsToMany(Client::class);
    }
}
