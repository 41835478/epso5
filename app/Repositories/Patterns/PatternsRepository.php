<?php

namespace App\Repositories\Patterns;

use App\Repositories\Repository;
use App\Repositories\Patterns\Traits\PatternsHelpers;
use App\Repositories\Patterns\Pattern;
//use DB;

class PatternsRepository extends Repository
{
    use PatternsHelpers;

    protected $model;

    public function __construct(Pattern $model)
    {
        $this->model = $model;
    }

    /**
     * Return all the records by crop
     * @param   int     $crop
     * @return  boolean
     */
    public function selectByCrop(int $crop, array $columns = ['id', 'name'])
    {
        return $this->model
            ->select(['id', 'pattern_name AS name'])
            ->where('crop_id', $crop)
            ->pluck($columns[1], $columns[0])
            ->toArray();
    }
}
