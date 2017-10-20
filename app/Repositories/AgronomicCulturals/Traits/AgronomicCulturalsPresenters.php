<?php

namespace App\Repositories\AgronomicCulturals\Traits;

trait AgronomicCulturalsPresenters {

    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function setAgronomicDateAttribute($value)
    {
        $this->attributes['agronomic_date'] = $this->setDate($value);
    }

    public function getAgronomicDateAttribute($value)
    {
        return $this->getDate($value);
    }
}
