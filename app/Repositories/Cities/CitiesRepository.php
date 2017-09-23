<?php

namespace App\Repositories\Cities;

use App\Repositories\Repository;
use App\Repositories\Cities\City;

class CitiesRepository extends Repository
{
    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the results from a model and return in json format.
     * Use for autocomplete...
     * @param string    $term       [The search term]
     * @param string    $row        [DB row to be searched]
     * @param array     $columns    [DB columns to be returned]
     * @return array
     */
    public function ajax($term = null, $row = null, array $columns = [])
    {
        //Null response
        if(!$term) {
            return response()->json(null);
        }

        $query = $this->model
            ->where('region_id', $row)
            ->whereRaw('LOWER(`city_name`) LIKE ? ', '%' . trim(strtolower($term)) . '%')
            ->select(['id', 'city_name AS name', 'city_lat AS lat', 'city_lng AS lng'])
            ->orderBy('city_name', 'asc');

        return response()->json($query->get());
    }
}
