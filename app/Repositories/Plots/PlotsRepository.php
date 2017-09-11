<?php

namespace App\Repositories\Plots;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Plots\Plot;
use App\Repositories\Plots\Traits\PlotsHelpers;
use App\Repositories\Repository;
use App\Repositories\Users\UsersRepository;
//use DB;

class PlotsRepository extends Repository
{
    use PlotsHelpers;

    protected $client;
    protected $model;
    protected $user;

    public function __construct(Plot $model, ClientsRepository $client, UsersRepository $user)
    {
        $this->client   = $client;
        $this->model    = $model;
        $this->user     = $user;
    }

    /**
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    public function getAdministration()
    {
        return [$this->client->listOfClientsByRole(), $this->user->listOfUsersByRole()]; 
    }

}
