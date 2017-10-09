<?php

namespace App\Repositories\AgronomicIncidents;

use App\Repositories\Repository;
use App\Repositories\AgronomicIncidents\Traits\AgronomicIncidentsHelpers;
use App\Repositories\AgronomicIncidents\AgronomicIncident;
use App\Repositories\_Traits\ClientUser;
//use DB;

class AgronomicIncidentsRepository extends Repository
{
    use AgronomicIncidentsHelpers, ClientUser;

    protected $model;

    public function __construct(AgronomicIncident $model)
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
