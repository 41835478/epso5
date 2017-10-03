<?php

namespace App\Repositories\Workers;

use App\Repositories\Repository;
use App\Repositories\Workers\Traits\WorkersHelpers;
use App\Repositories\Workers\Worker;
//use DB;

class WorkersRepository extends Repository
{
    use WorkersHelpers;

    protected $model;

    public function __construct(Worker $model)
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
