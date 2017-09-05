<?php

namespace App\Repositories\CropVarieties;

use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\CropVarieties\Traits\CropVarietiesHelpers;
use App\Repositories\Repository;
use Credentials;

class CropVarietiesRepository extends Repository
{
    use CropVarietiesHelpers;

    protected $model;

    public function __construct(CropVariety $model)
    {
        $this->model = $model;
    }
}
