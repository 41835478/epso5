<?php

namespace App\Repositories\Users\Traits;

trait UsersPresenters {
    
    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value)
    {
        if(!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}