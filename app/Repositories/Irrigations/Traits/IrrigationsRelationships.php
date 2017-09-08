<?php

namespace App\Repositories\Irrigations\Traits;

use App\Repositories\Clients\Client;

trait IrrigationsRelationships {

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
