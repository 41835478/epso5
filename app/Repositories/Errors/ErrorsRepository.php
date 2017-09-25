<?php

namespace App\Repositories\Errors;

use App\Repositories\Repository;
use App\Repositories\Errors\Error;
use Credentials;

class ErrorsRepository extends Repository
{
    protected $model;

    public function __construct(Error $model)
    {
        $this->model = $model;
    }

    /**
     * Add new error
     * @param   int     $id (the array with the error information)
     * @return  boolean
     */
    public function addError($message)
    {
        //Create an Error
        return $this->model->create([
            'user_id'           => Credentials::id(),
            'error_url'         => request()->url(),
            'error_description' => $message,
        ]);
    }
}
