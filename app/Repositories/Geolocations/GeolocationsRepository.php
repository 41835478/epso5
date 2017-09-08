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
}
