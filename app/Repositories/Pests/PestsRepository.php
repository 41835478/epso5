<?php

namespace App\Repositories\Pests;

use App\Repositories\Repository;
use App\Repositories\Pests\Traits\PestsHelpers;
use App\Repositories\Pests\Pest;
//use DB;

class PestsRepository extends Repository
{
    use PestsHelpers;

    protected $model;

    public function __construct(Pest $model)
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
