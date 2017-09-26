<?php

namespace App\Repositories\Geolocations;

use App\Jobs\GeolocationHeight;
use App\Repositories\Geolocations\Plot;
use App\Repositories\Repository;

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
    public function create($request = null)
    {
        //Create an Item
        if ($request) {
            //Create the geolocation item
            $geolocation = $this->model->create($request);
            //All the jobs 
            GeolocationHeight::dispatch($geolocation);
            //Confirm the operations
            return true;
        }
        return false;
    }
}
