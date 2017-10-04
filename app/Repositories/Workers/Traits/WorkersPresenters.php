<?php

namespace App\Repositories\Workers\Traits;

trait WorkersPresenters {

    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function setWorkerRopoDateAttribute($value)
    {
        $this->attributes['worker_ropo_date'] = $this->setDate($value);
    }

    public function getWorkerRopoDateAttribute($value)
    {
        return $this->getDate($value);
    }

    public function setWorkerStartAttribute($value)
    {
        $this->attributes['worker_start'] = $this->setDate($value);
    }

    public function getWorkerStartAttribute($value)
    {
        return $this->getDate($value);
    }
}
