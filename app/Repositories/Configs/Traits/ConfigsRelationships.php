<?php

namespace App\Repositories\Configs\Traits;

use App\Repositories\Clients\Client;

trait ConfigsRelationships {

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
