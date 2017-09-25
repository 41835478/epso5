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

    /**
     * Create or update a record in storage
     * @param   int     $id (the array with the error information)
     * @return  boolean
     */
    public function store($id = null)
    {
        //Create an Error
        return $this->model->create($id);
    }
}
