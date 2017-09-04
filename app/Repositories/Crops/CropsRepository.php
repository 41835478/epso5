<?php

namespace App\Repositories\Crops;

use App\Repositories\Repository;
use App\Repositories\Crops\Traits\CropsHelpers;
use App\Repositories\Crops\Crop;

class CropsRepository extends Repository
{
    use CropsHelpers;

    protected $model;

    public function __construct(Crop $model)
    {
        $this->model = $model;
    }
}
