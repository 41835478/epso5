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

    /**
     * Return all the records by crop
     * @param   int     $crop
     * @return  boolean
     */
    public function store($id = null)
    {
        //First delete all the crop types 
        $delete = $this->model
            ->where('crop_id', request('crop_id'))
            ->delete();

        foreach(request('crop_variety_type_name') as $code => $name) {
            if(!is_null($code) && !is_null($name)) {
                $create = $this->model
                    ->create([
                        'crop_id'                   => request('crop_id'),
                        'crop_variety_type_name'    => $name,
                        'crop_variety_type_code'    => $code,
                    ]);
            }
        }
        return true;
    }
}
