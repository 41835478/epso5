<?php

namespace App\Repositories\AgronomicHarvests\Traits;

trait AgronomicHarvestsPresenters {

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

    public function getAgronomicQuantityHaAttribute($value)
    {
        $value = $this->attributes['agronomic_quantity'] / $this->plot->plot_area;
            return number_format($value, 2, '.', '');
    }

    public function getAgronomicBaumeKgAttribute($value)
    {
        return $this->attributes['agronomic_baume'] * $this->attributes['agronomic_quantity'];
    }
}
