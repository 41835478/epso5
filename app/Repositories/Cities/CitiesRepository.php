<?php

namespace App\Repositories\Cities;

use App\Repositories\Cities\CitiesRepository;
use App\Repositories\Repository;
use App\Repositories\Cities\Traits\CitiesHelpers;
use App\Repositories\Cities\City;
use DB;

class CitiesRepository extends Repository
{
    use CitiesHelpers;

    protected $model;

    public function __construct(City $model)
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
