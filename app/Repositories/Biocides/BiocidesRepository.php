<?php

namespace App\Repositories\Biocides;

use App\Repositories\Repository;
use App\Repositories\Biocides\Traits\BiocidesHelpers;
use App\Repositories\Biocides\Biocide;

class BiocidesRepository extends Repository
{
    use BiocidesHelpers;

    protected $model;

    public function __construct(Biocide $model)
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
            ->where($row, 'LIKE', '%' . $term . '%')
            ->select('biocide_num AS num', 'biocide_name AS name', 'biocide_company AS company', 'biocide_formula AS formula');

        return response()->json($query->get());
    }
}
