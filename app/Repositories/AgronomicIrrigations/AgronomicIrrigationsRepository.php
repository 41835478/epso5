<?php

namespace App\Repositories\AgronomicIrrigations;

use App\Repositories\AgronomicIrrigations\AgronomicIrrigation;
use App\Repositories\AgronomicIrrigations\Traits\AgronomicIrrigationsHelpers;
use App\Repositories\Repository;
use App\Repositories\_Traits\ClientUser;
//use DB;

class AgronomicIrrigationsRepository extends Repository
{
    use AgronomicIrrigationsHelpers, ClientUser;

    protected $model;

    public function __construct(AgronomicIrrigation $model)
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
