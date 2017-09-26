<?php

namespace App\Repositories\Geolocations;

use App\Repositories\Repository;
use App\Repositories\Geolocations\Plot;

class GeolocationsRepository extends Repository
{
    protected $model;

    public function __construct(Geolocation $model)
    {
        $this->model = $model;
    }

    /**
     * Create or update a record in storage
     * @param   int     $id => $request
     * @return  boolean
     */
    public function store($id = null)
    {
        //Create an Item
        if ($id) {
            return $this->model->create($id);
        }
        return false;
    }
}
