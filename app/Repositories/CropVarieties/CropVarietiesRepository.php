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

    /**
     * Return all the records by crop
     * @param   int     $crop
     * @return  boolean
     */
    public function selectByCrop(int $crop, array $columns = ['id', 'name'])
    {
        return ['' => ''] + $this->model
            ->select(['id', 'crop_variety_name AS name'])
            ->where('crop_id', $crop)
            ->pluck($columns[1], $columns[0])
            ->toArray();
    }
}
