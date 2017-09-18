<?php

namespace App\Repositories\ClimaticStations;

use App\Repositories\Repository;
use App\Repositories\ClimaticStations\Traits\ClimaticStationsHelpers;
use App\Repositories\ClimaticStations\ClimaticStation;
//use DB;

class ClimaticStationsRepository extends Repository
{
    use ClimaticStationsHelpers;

    protected $model;

    public function __construct(ClimaticStation $model)
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
