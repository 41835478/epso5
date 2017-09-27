<?php

namespace App\Repositories\ClimaticStations;

use App\Repositories\Repository;
use App\Repositories\ClimaticStations\Traits\ClimaticStationsHelpers;
use App\Repositories\ClimaticStations\ClimaticStation;
use DB;

class ClimaticStationsRepository extends Repository
{
    use ClimaticStationsHelpers;

    protected $model;
    //Max distance to search a station (Km)
    protected $distance = 150;

    public function __construct(ClimaticStation $model)
    {
        $this->model = $model;
    }

    /**
     * Get the closest climatic station
     *
     * @param int $plot_lat
     * @param int $plot_lng
     *
     * @return collection
     */
    public function closest($request)
    {
        return $this->model
            ->on('mysql_climatic')
            ->select(DB::raw(self::sqlLatLngDistance()))
            ->setBindings([$request->geo_lat, $request->geo_lng, $request->geo_lat])
            ->having('distance', '<', $this->distance)
            ->orderBy('distance')
            ->first() ?? null;
    }

    /**
     * Generate the sql for get the closest coordenates from a GPS
     *
     * @return string
     */
    private function sqlLatLngDistance()
    {
        return '*, (3959*acos(cos(radians(?))*cos(radians(station_lat))*cos(radians(station_lng)-radians(?))+sin(radians(?))*sin(radians(station_lat)))) AS distance';
    }

}
