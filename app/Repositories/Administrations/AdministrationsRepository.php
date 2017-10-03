<?php

namespace App\Repositories\Administrations;

use App\Repositories\Repository;
use App\Repositories\Administrations\Administration;
//use DB;

class AdministrationsRepository extends Repository
{
    protected $model;

    public function __construct(Administration $model)
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
