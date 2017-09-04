<?php

namespace App\Repositories\Regions;

use App\Repositories\Repository;
use App\Repositories\Regions\City;
use DB;

class RegionsRepository extends Repository
{
    protected $model;

    public function __construct(Region $model)
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
