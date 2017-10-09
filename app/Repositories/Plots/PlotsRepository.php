<?php

namespace App\Repositories\Plots;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Geolocations\GeolocationsRepository;
use App\Repositories\Plots\Plot;
use App\Repositories\Plots\Traits\PlotsHelpers;
use App\Repositories\Repository;
use App\Repositories\Users\UsersRepository;
use App\Repositories\_Traits\ClientUser;
use Credentials;
//use DB;

class PlotsRepository extends Repository
{
    use ClientUser, PlotsHelpers; //There is helper functions!!!!

    protected $client;
    protected $model;
    protected $user;

    public function __construct(Plot $model, ClientsRepository $client, UsersRepository $user)
    {
        $this->client = $client;
        $this->model  = $model;
        $this->user   = $user;
    }

    /**
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    public function store($id = null)
    {
        //Create an Item
        if (is_null($id)) {
            $plot = $this->model->create(request()->all());
            //Add request values for geolocation db
            $request = array_merge(request()->all(), ['plot_id' => $plot->id]);
                //Add the geolocation values and execute the WMS jobs
                return app(GeolocationsRepository::class)->create($request) 
                    ? $plot 
                    : false;
        }
        //Update an Item
        if(is_numeric($id)) {
            //Get the item
            $item = $this->model->find($id);
            //Check if the user own the database record
            //and if the role is authorizate
            if(!Credentials::authorize($item)) {
                return Credentials::accessError();
            }
            return $item->update(request()->all());
        }
        return false;
    }

    /**
     * Get all the active stations (climatic stations)
     * @return  array
     */
    public function activeStations()
    {
        return $this->model
            ->select('climatic_station_id')
            ->distinct()
            ->get();
    }

    /**
     * Get all the results filter by user
     * @param   string $user
     * @param   array $select
     * @return  collection
     */
    public function listsByUser($user, $select = ['id', 'plot_name'])//Maybe the ['plot_name', 'id'] cause a fail... the original value was pluck('id')
    {
        return $this->model
            ->whereUserId($user)
            ->pluck($select[1], $select[0])
            // ->pluck('id')
            ->toArray();
    }

    /**
     * Get all the results filter by user
     * @param   string $user
     * @param   array $select
     * @return  collection
     */
    public function listsByClient($client, $select = ['id', 'plot_name'])//Maybe the ['id'] cause a fail... originaly with 'id'
    {
        return $this->model
            ->whereClientId($client)
            ->pluck($select[1], $select[0])
            ->toArray();
    }

    /**
     * Get all the results filter by role
     * @return  collection
     */
    public function listsByRole($select = ['id', 'plot_name'])
    {
        if(Credentials::isAdmin()) {
            return $this->lists($select);
        } elseif(Credentials::isEditor()) {
            return self::listsByClient(getClientId(), $select);
        } else {
            return self::listsByUser(Credentials::id(), $select);
        }
    }

    /**
     * Get all the results filter by role
     * @return  collection
     */
    public function listsIfOnlyUser()
    {
        return Credentials::isOnlyRole('user') 
            ? self::listsByRole() 
            : null;
    }
}
