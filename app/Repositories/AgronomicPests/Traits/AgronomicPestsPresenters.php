<?php

namespace App\Repositories\AgronomicPests\Traits;

trait AgronomicPestsPresenters {

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
