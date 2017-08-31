<?php

namespace App\Repositories\Profiles\Traits;

trait ProfilesRelationships {
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongTo(User::class);
    }
}