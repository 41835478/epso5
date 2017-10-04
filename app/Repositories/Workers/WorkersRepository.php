<?php

namespace App\Repositories\Workers;

use App\Repositories\Repository;
use App\Repositories\Workers\Traits\WorkersHelpers;
use App\Repositories\Workers\Worker;
use App\Repositories\_Traits\ClientUser;

class WorkersRepository extends Repository
{
    use WorkersHelpers, ClientUser;

    protected $model;

    public function __construct(Worker $model)
    {
        $this->model = $model;
    }
}
