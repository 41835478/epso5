<?php

namespace App\Repositories\Plots;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Geolocations\GeolocationsRepository;
use App\Repositories\Plots\Plot;
use App\Repositories\Plots\Traits\PlotsHelpers;
use App\Repositories\Repository;
use App\Repositories\Users\UsersRepository;
use Credentials;
//use DB;

class PlotsRepository extends Repository
{
    use PlotsHelpers; //There is helper functions!!!!

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
     * Only for assign. Show only the plots without users.
     * Prepare the database query for the yajra dataTable service
     * @param   string   $columns
     * @param   string   $id [In case we need an extra variable to check with something...]
     * @param   string   $table [Just in case we need to add de table name for avoid ambiguous row names]
     * @return  ajax
     */
    public function dataTable(array $columns = ['*'], $id = null, $table = null)
    {
        //Just in case we need to add de table name for avoid ambiguous row names
        $table = $table ? $table . '.' : '';
        //The query
        $query = $this->model->select($columns);
            //The filters
            return $this->filter($query, $table, $id);
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

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
   
    /**
     * Filter by role and empty users
     * @param   object   $query
     * @param   string   $table
     * @param   boolean  $emptyUser [Value from the controller assign]
     * @return  ajax
     */
    private function filter($query, $table, $emptyUser = false)
    {
        return $query->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
            return $query;
        })
        ->when(Credentials::maxRole() === 'editor', function ($query) use ($table) {
            return $query->where($table . 'client_id', Credentials::client());
        })
        ->when(Credentials::maxRole() === 'user', function ($query) use ($table) {
            return $query->where($table . 'user_id', Credentials::id());
        })
        ->when($emptyUser, function ($query) use ($table) {
            return $query->where('user_id', null);
        });
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
}
