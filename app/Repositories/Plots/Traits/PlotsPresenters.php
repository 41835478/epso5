<?php

namespace App\Repositories\Plots\Traits;

trait PlotsPresenters {

    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function setPlotStartDateAttribute($value)
    {
        $this->attributes['plot_start_date'] = $this->setDate($value);
    }

    public function getPlotStartDateAttribute($value)
    {
        return $this->getDate($value);
    }

    public function setPlotRealAreaAttribute($value)
    {
        $this->attributes['plot_real_area'] = cultivatedArea($this->attributes);
    }

    public function getPlotRealAreaAttribute($value)
    {
        return ($value <= 0) 
            ? cultivatedArea($this->attributes) 
            : $value;
    }
}
