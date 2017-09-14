<?php

namespace App\Repositories\Cities;

use App\Repositories\Repository;
use App\Repositories\Cities\City;

class CitiesRepository extends Repository
{
    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
