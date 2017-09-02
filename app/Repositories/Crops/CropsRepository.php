<?php

namespace App\Repositories\Crops;

use App\Repositories\Crops\CropsRepository;
use App\Repositories\Repository;
use App\Repositories\Crops\Traits\CropsHelpers;
use App\Repositories\Crops\Crop;
use DB;

class CropsRepository extends Repository
{
    use CropsHelpers;

    protected $model;

    public function __construct(Crop $model)
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
