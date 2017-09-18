<?php

namespace App\Repositories\Climatics;

use App\Repositories\Repository;
use App\Repositories\Climatics\Traits\ClimaticsHelpers;
use App\Repositories\Climatics\Climatic;
//use DB;

class ClimaticsRepository extends Repository
{
    use ClimaticsHelpers;

    protected $model;

    public function __construct(Climatic $model)
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
