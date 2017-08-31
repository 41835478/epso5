<?php 

namespace App\Repositories\Profiles;

use App\Repositories\Repository;

class ProfilesRepository extends Repository {

    protected $model;
    
    public function __construct(Profile $model)
    {
        $this->model = $model;
    }
}