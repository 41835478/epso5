<?php

namespace App\Repositories\States;

use App\Repositories\Repository;
use App\Repositories\States\City;

class StatesRepository extends Repository
{
    protected $model;

    public function __construct(State $model)
    {
        $this->model = $model;
    }
}
