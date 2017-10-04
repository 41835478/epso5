<?php

namespace App\Repositories\Plots\Traits;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Patterns\PatternsRepository;
use App\Repositories\Users\UsersRepository;

trait PlotsHelpers {

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

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

}
