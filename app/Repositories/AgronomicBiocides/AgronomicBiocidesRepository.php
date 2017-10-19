<?php

namespace App\Repositories\AgronomicBiocides;

use App\Repositories\Repository;
use App\Repositories\AgronomicBiocides\Traits\AgronomicBiocidesHelpers;
use App\Repositories\AgronomicBiocides\AgronomicBiocide;
use App\Repositories\_Traits\ClientUser;
//use DB;

class AgronomicBiocidesRepository extends Repository
{
    use AgronomicBiocidesHelpers, ClientUser;

    protected $model;

    public function __construct(AgronomicBiocide $model)
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
