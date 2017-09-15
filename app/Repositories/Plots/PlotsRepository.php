<?php

namespace App\Repositories\Plots;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Patterns\PatternsRepository;
use App\Repositories\Plots\Plot;
use App\Repositories\Plots\Traits\PlotsHelpers;
use App\Repositories\Repository;
use App\Repositories\Users\UsersRepository;
use Credentials;
//use DB;

class PlotsRepository extends Repository
{
    use PlotsHelpers;

    protected $client;
    protected $model;
    protected $user;

    public function __construct(Plot $model, ClientsRepository $client, UsersRepository $user)
    {
        $this->client   = $client;
        $this->model    = $model;
        $this->user     = $user;
    }

    /**
     * Get all the administration Values
     * @return  boolean
     */
    public function getAdministration()
    {
        //Get the list of users and the list of clients. All base on the current user role!!!
        return [
            app(ClientsRepository::class)->listOfClientsByRole() ?? [], 
            app(UsersRepository::class)->listOfUsersByRole() ?? []
        ]; 
    }

    /**
     * Get all the values for the crop
     * @param mixed $data
     * 
     * @return  boolean
     */
    public function getCrop($data = null)
    {
        //Default values
        list($clientId, $cropId, $type) = self::getData($data);
            return [
                //Get the Crop variety type (only if exist...)
                app(CropVarietyTypesRepository::class)->selectByCrop($cropId) ?? null,//Null because only show it if not null
                //Get the Crop patterns
                app(PatternsRepository::class)->selectByCrop($cropId) ?? [], 
                //Only show the crop varieties if there is a type. If not, return empty and you need to load it by ajax.
                //(Ex: in vineyards, first we need a variety type (like red or white), before a variety).
                $type ? [] : app(CropVarietiesRepository::class)->selectByCrop($cropId),
                //List of trainings for this client
                app(ClientsRepository::class)->listOfTrainings($clientId) ?? []
            ];
    }

    /**
     * Get the default data for the plot
     * @param object $data
     * 
     * @return  boolean
     */
    private function getData($data)
    {
        //In a few cases, we need to now if this crop has a crop_variety_type
        if(isset($data['client_id'])) {
            return [$data['client_id'], $data['crop_id'], $data['type']];
        }
        if(isset($data->client_id)) {
            return [$data->client_id, $data->crop_id, null];//Not needed the type, because we are editing, and we have to load!!!
        }
            return [getClientId(), getCropId(), getCropType()];
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
}
