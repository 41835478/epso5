<?php

namespace App\Repositories\Clients\Traits;

use App\Repositories\Regions\Region;
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

    public function region()
    {
        return $this->belongsToMany(Region::class);
    }
}
