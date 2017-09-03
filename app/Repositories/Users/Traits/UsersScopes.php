<?php

namespace App\Repositories\Users\Traits;

trait UsersScopes {

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeLast($query)
    {
        return $query
            ->where('is_god', 0)
            ->where('is_admin', 0)
            ->where('is_editor', 0)
            ->latest()
            ->first();
    }
}