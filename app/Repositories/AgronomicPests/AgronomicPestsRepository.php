<?php

namespace App\Repositories\AgronomicPests;

use App\Repositories\Repository;
use App\Repositories\AgronomicPests\Traits\AgronomicPestsHelpers;
use App\Repositories\AgronomicPests\AgronomicPest;
use App\Repositories\_Traits\ClientUser;
//use DB;

class AgronomicPestsRepository extends Repository
{
    use AgronomicPestsHelpers, ClientUser;

    protected $model;

    public function __construct(AgronomicPest $model)
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
