<?php

namespace App\Repositories\Pests;

use App\Repositories\Repository;
use App\Repositories\Pests\Traits\PestsHelpers;
use App\Repositories\Pests\Pest;
use Credentials;

class PestsRepository extends Repository
{
    use PestsHelpers;

    protected $model;

    public function __construct(Pest $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the fields from storage
     * @param integer $cropId
     * @param array $columns
     * 
     * @return collection
     */
    public function listByCrop($cropId, array $columns = ['id', 'pest_name'])
    {
        return $this->model
            ->whereCropId($cropId)
            ->pluck($columns[1], $columns[0])
            ->toArray();
    }

    /**
     * Get all the fields from storage
     * @param integer $cropId
     * 
     * @return collection
     */
    public function listByCropAndRole($cropId = null)
    {
        return $cropId 
            ? self::listByCrop($cropId)
            : (Credentials::isOnlyRole('user') ? self::listByCrop(getCropId()) : null);
    }
}
