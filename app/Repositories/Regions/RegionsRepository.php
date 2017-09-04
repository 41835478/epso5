<?php

namespace App\Repositories\Regions;

use App\Repositories\Repository;
use App\Repositories\Regions\City;
use DB;

class RegionsRepository extends Repository
{
    protected $model;

    public function __construct(Region $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the results from a model and return in json format.
     * Use for autocomplete...
     * @param string    $id       [The search id]
     * @param string    $row        [DB row to be searched]
     * @param array     $columns    [DB columns to be returned]
     * @return array
     */
    public function ajax($id = null, $row = null, array $columns = [])
    {
        //Null response
        if(!$id) {
            return response()->json(null);
        }

        $columns = !empty($columns) 
            ? $columns 
            : ['id', $row . ' AS name'];

        $query = $this->model
            ->where($row, $id)
            ->select($columns[0], $columns[1]);

        return response()->json($query->get());
    }

}
