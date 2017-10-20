<?php

namespace App\Repositories\AgronomicCulturals;

use App\Repositories\Repository;
use App\Repositories\AgronomicCulturals\Traits\AgronomicCulturalsHelpers;
use App\Repositories\AgronomicCulturals\AgronomicCultural;
use App\Repositories\_Traits\ClientUser;
//use DB;

class AgronomicCulturalsRepository extends Repository
{
    use AgronomicCulturalsHelpers, ClientUser;

    protected $model;

    public function __construct(AgronomicCultural $model)
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
