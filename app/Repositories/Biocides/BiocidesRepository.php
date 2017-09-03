<?php

namespace App\Repositories\Biocides;

use App\Repositories\Biocides\BiocidesRepository;
use App\Repositories\Repository;
use App\Repositories\Biocides\Traits\BiocidesHelpers;
use App\Repositories\Biocides\Biocide;
use DB;

class BiocidesRepository extends Repository
{
    use BiocidesHelpers;

    protected $model;

    public function __construct(Biocide $model)
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
