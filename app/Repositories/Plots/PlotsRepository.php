<?php

namespace App\Repositories\Plots;

use App\Repositories\Repository;
use App\Repositories\Plots\Traits\PlotsHelpers;
use App\Repositories\Plots\Plot;
//use DB;

class PlotsRepository extends Repository
{
    use PlotsHelpers;

    protected $model;

    public function __construct(Plot $model)
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
