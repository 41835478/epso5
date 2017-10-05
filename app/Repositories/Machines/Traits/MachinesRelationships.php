<?php

namespace App\Repositories\Machines\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\Users\User;

trait MachinesRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
