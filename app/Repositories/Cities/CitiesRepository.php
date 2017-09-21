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

        $columns = !empty($columns) 
            ? $columns 
            : ['id', $row . ' AS name'];

        $query = $this->model
            ->where('city_name', 'LIKE', '%' . $term . '%')
            ->where('region_id', $row)
            ->select($columns[0], $columns[1])
            ->orderBy('city_name', 'asc');

        return response()->json($query->get());
    }
}
