<?php

namespace App\Repositories\Edaphologies;

use App\Repositories\Repository;
use App\Repositories\Edaphologies\Traits\EdaphologiesHelpers;
use App\Repositories\Edaphologies\Edaphology;
//use DB;

class EdaphologiesRepository extends Repository
{
    use EdaphologiesHelpers;

    protected $model;

    public function __construct(Edaphology $model)
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
