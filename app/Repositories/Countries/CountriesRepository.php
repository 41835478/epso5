<?php

namespace App\Repositories\Countries;

use App\Repositories\Repository;
use App\Repositories\Countries\City;

class CountriesRepository extends Repository
{
    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}
