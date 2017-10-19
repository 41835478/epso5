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

    public function setAgronomicQuantityHaAttribute($value)
    {
        $value = $this->attributes['agronomic_quantity'] / $this->plot->plot_area;
            $this->attributes['agronomic_quantity_ha'] = number_format($value, 2, '.', '');
    }
}
