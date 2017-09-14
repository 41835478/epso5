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
    public function selectByCrop(int $crop, $type = null, array $columns = ['id', 'name'])
    {
        return $this->model
            ->select(['id', 'crop_variety_name AS name'])
            ->where('crop_id', $crop)
            ->when($type, function ($query) use ($type) {
                return $query->where('crop_variety_type', $type);
            })
            ->pluck($columns[1], $columns[0])
            ->toArray();
    }

    /**
     * Return all the records by crop
     * @param   int     $crop
     * @return  boolean
     */
    public function ajaxByCrop(int $crop, $type = null, array $columns = ['id', 'name'])
    {
        $response = $this->model
            ->select(['id', 'crop_variety_name AS name'])
            ->where('crop_id', $crop)
            ->when($type, function ($query) use ($type) {
                return $query->where('crop_variety_type', $type);
            });

            return response()->json($response->get());
    }
}
