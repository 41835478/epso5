<?php

namespace App\Repositories\Errors;

use App\Repositories\Repository;
use App\Repositories\Errors\Error;

class ErrorsRepository extends Repository
{
    protected $model;

    public function __construct(Error $model)
    {
        $this->model = $model;
    }
}
