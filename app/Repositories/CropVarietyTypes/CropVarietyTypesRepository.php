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
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    // public function store($id = null)
    // {
    //     return DB::transaction(function () use ($id) {
    //         return true;
    //     });
    //     //Create an error
    //     return false;
    // }

}
