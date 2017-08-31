<?php

namespace App\Repositories\Users\Traits;

use App\Repositories\Clients\Client;
use App\Repositories\Profiles\Profile;

trait UsersRelationships {
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}