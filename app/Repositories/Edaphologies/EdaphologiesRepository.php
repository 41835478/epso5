<?php

namespace App\Repositories\Edaphologies;

use App\Repositories\Repository;
use App\Repositories\Edaphologies\Traits\EdaphologiesHelpers;
use App\Repositories\Edaphologies\Edaphology;
//use DB;

class EdaphologiesRepository extends Repository
{
    use EdaphologiesHelpers;

    protected $model;

    public function __construct(Edaphology $model)
    {
        $this->model = $model;
    }

    /**
     * Prepare the database query for the yajra dataTable service
     * @param   string   $columns
     * @param   string   $id [In case we need an extra variable to check with something...]
     * @param   string   $table [Just in case we need to add de table name for avoid ambiguous row names]
     * @return  ajax
     */
    public function dataTable(array $columns = ['*'], $table = null, $userNull = false, $value = null)
    {
        //The query
        $query = $this->model
            ->select($columns)->where('plot_id', $value);
                //The filters
                return $this->filterByRole($query, $table, $userNull);
    }

}
