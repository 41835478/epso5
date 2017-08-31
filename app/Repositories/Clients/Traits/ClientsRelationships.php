<?php

namespace App\Repositories\Clients\Traits;

use App\Repositories\Users\User;

trait ClientsRelationships {

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
