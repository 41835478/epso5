<?php

namespace App\Repositories\Trainings;

use App\Repositories\Repository;
use App\Repositories\Trainings\Traits\TrainingsHelpers;
use App\Repositories\Trainings\Training;
//use DB;

class TrainingsRepository extends Repository
{
    use TrainingsHelpers;

    protected $model;

    public function __construct(Training $model)
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
