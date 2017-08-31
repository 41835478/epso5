<?php

namespace App\Repositories\Profiles\Traits;

trait ProfilesPresenters {
    
    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function setProfileBirthdateAttribute($value)
    {
        $this->attributes["profile_birthdate"] = $this->setDate($value);
    }

    public function getProfileBirthdateAttribute($value)
    {
        return $this->getDate($value);
    }
}