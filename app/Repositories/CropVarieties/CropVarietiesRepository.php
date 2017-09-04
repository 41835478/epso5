<?php

namespace App\Repositories\CropVarieties;

use App\Repositories\Repository;
use App\Repositories\CropVarieties\Traits\CropVarietiesHelpers;
use App\Repositories\CropVarieties\CropVariety;
//use DB;

class CropVarietiesRepository extends Repository
{
    use CropVarietiesHelpers;

    protected $model;

    public function __construct(CropVariety $model)
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
