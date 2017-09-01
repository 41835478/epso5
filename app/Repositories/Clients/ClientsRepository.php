<?php

namespace App\Repositories\Clients;

use App\Repositories\Clients\Client;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Clients\Traits\ClientsHelpers;
use App\Repositories\Repository;
use App\Services\Images\Images;
use DB;

class ClientsRepository extends Repository
{
    use ClientsHelpers;

    protected $images;
    protected $model;

    public function __construct(Client $model, Images $images)
    {
        $this->images   = $images;
        $this->model    = $model;
    }

    /**
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    public function store($id = null)
    {
        return DB::transaction(function () use ($id) {
            $request = $this->requestOperations(request()->all());
            //Create an Item
            if (is_null($id)) {
                return $this->model
                    ->create($request);
            }
            //Update an Item
            if(is_numeric($id)) {
                //Get the item
                $item = $this->model->find($id);
                //
                return $item->update($request);
            }
            //
            return true;
        });
        //Create an error
        return false;
    }
}
