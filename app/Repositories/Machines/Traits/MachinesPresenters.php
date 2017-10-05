<?php

namespace App\Repositories\Machines\Traits;

trait MachinesPresenters {

    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */

    public function setMachineDateAttribute($value)
    {
        $this->attributes['machine_date'] = $this->setDate($value);
    }

    public function getMachineDateAttribute($value)
    {
        return $this->getDate($value);
    }

    public function setMachineInspectionAttribute($value)
    {
        $this->attributes['machine_inspection'] = $this->setDate($value);
    }

    public function getMachineInspectionAttribute($value)
    {
        return $this->getDate($value);
    }
}
