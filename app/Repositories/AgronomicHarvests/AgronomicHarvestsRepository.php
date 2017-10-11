<?php

namespace App\Repositories\AgronomicHarvests;

use App\Repositories\Repository;
use App\Repositories\AgronomicHarvests\Traits\AgronomicHarvestsHelpers;
use App\Repositories\AgronomicHarvests\AgronomicHarvest;
use App\Repositories\_Traits\ClientUser;
//use DB;

class AgronomicHarvestsRepository extends Repository
{
    use AgronomicHarvestsHelpers, ClientUser;

    protected $model;

    public function __construct(AgronomicHarvest $model)
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
