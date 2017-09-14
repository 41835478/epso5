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
}
