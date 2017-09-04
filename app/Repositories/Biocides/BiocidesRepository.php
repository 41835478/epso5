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
}
