<?php

namespace App\Repositories\Clients;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Repository;
use App\Repositories\Clients\Traits\ClientsHelpers;
use App\Repositories\Clients\Client;
use DB;

class ClientsRepository extends Repository
{
    use ClientsHelpers;

    protected $model;

    public function __construct(Client $model)
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
