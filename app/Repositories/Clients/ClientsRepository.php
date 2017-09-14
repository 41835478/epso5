<?php

namespace App\Repositories\Clients;

use App\Repositories\Clients\Client;
use App\Repositories\Clients\Traits\ClientsHelpers;
use App\Repositories\Repository;
use App\Services\Images\Images;
use Credentials, DB;

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
            $request = $this->requestOperations(request()->all());//ClientsHelpers
            //Create an Item
            if (is_null($id)) {
                //Create item
                $item = $this->model->create($request);
                //Sync with relationships
                $this->syncRelationships($item);//ClientsHelpers
                //Return item
                return $item;
            }
            //Update an Item
            if(is_numeric($id)) {
                //Get the item
                $item = $this->model->find($id);
                //Sync with relationships
                $this->syncRelationships($item);//ClientsHelpers
                //Return item
                return $item->update($request);
            }
            //Create an error
            return false;
        });
        //Create an error
        return false;
    }

    /**
     * List of clients by role
     * @return  array
     */
    public function listOfClientsByRole()
    {
        if(Credentials::isAdmin()) {
            return $this->model
                ->pluck('client_name', 'id')
                ->toArray();
        }
            return [];
    }
}
