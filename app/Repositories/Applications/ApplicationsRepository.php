<?php

namespace App\Repositories\Applications;

use App\Repositories\Repository;
use App\Repositories\Applications\Traits\ApplicationsHelpers;
use App\Repositories\Applications\Application;
//use DB;

class ApplicationsRepository extends Repository
{
    use ApplicationsHelpers;

    protected $model;

    public function __construct(Application $model)
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
