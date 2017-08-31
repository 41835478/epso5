<?php 

namespace App\Repositories\Clients;

use App\Repositories\Repository;

class ClientsRepository extends Repository {

    protected $model;
    
    public function __construct(Client $model)
    {
        $this->model = $model;
    }
}