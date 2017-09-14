<?php

namespace App\Repositories\Irrigations;

use App\Repositories\Repository;
use App\Repositories\Irrigations\Traits\IrrigationsHelpers;
use App\Repositories\Irrigations\Irrigation;
//use DB;

class IrrigationsRepository extends Repository
{
    use IrrigationsHelpers;

    protected $model;

    public function __construct(Irrigation $model)
    {
        $this->model = $model;
    }
}
