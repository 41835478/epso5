<?php

namespace App\Repositories\Configs;

use App\Repositories\Repository;
use App\Repositories\Configs\Traits\ConfigsHelpers;
use App\Repositories\Configs\Config;
//use DB;

class ConfigsRepository extends Repository
{
    use ConfigsHelpers;

    protected $model;

    public function __construct(Config $model)
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
