<?php

namespace App\Repositories\Machines;

use App\Repositories\Machines\Machine;
use App\Repositories\Machines\Traits\MachinesHelpers;
use App\Repositories\Repository;
use App\Repositories\_Traits\ClientUser;
//use DB;

class MachinesRepository extends Repository
{
    use MachinesHelpers, ClientUser;

    protected $model;

    public function __construct(Machine $model)
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
