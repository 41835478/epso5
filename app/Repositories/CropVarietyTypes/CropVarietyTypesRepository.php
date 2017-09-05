<?php

namespace App\Repositories\CropVarietyTypes;

use App\Repositories\Repository;
use App\Repositories\CropVarietyTypes\Traits\CropVarietyTypesHelpers;
use App\Repositories\CropVarietyTypes\CropVarietyType;
//use DB;

class CropVarietyTypesRepository extends Repository
{
    use CropVarietyTypesHelpers;

    protected $model;

    public function __construct(CropVarietyType $model)
    {
        $this->model = $model;
    }

    /**
     * Return all the records by crop
     * @param   int     $crop
     * @return  boolean
     */
    public function allByCrop(int $crop)
    {
        return $this->model
            ->where('crop_id', $crop)
            ->get();
    }

}
