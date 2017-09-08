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
