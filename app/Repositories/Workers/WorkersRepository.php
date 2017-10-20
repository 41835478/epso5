<?php

namespace App\Repositories\Workers;

use App\Repositories\Repository;
use App\Repositories\Workers\Traits\WorkersHelpers;
use App\Repositories\Workers\Worker;
use App\Repositories\_Traits\ClientUser;
use Credentials;

class WorkersRepository extends Repository
{
    use WorkersHelpers, ClientUser;

    protected $model;

    public function __construct(Worker $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the results filter by user
     * @param   string $user
     * @param   array $select
     * @return  collection
     */
    public function listsByUser($user, $select = ['id', 'worker_name'])
    {
        return $this->model
            ->whereUserId($user)
            ->pluck($select[1], $select[0])
            ->toArray();
    }
}
