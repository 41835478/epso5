<?php 
/**
* Get the geolocation data using the Nominantim service form OSM
* Values:
*     address:
*         road
*         neighbourhood
*         suburb
*         city_district
*         city
*         county
*         state
*         country
*         country_code
*         postcode
*/

namespace App\Services\Geolocation\Servers;

use App\Services\Geolocation\GeolocationContract;
use App\Services\Geolocation\GeolocationRepository;

class Nominatim extends GeolocationRepository implements GeolocationContract {

    protected $server = 'http://nominatim.openstreetmap.org/reverse?format=json&zoom=18&addressdetails=1';
    protected $field  = 'postcode';

    //Required variables: bbox, width, height, pointX, pointY
    public function server($request) {
        return $this->server . 
            '&lat=' . $request->geo_lat . 
            '&lon=' . $request->geo_lng;
    }

    /**
    * Conect with the server
    *
    * @param object $request data
    * @return  mixed response.
    */
    public function handler($request)
    {
        //Get the server url
        $server = self::server($request);
        //Make the connection to the server
        $connection = parent::getFile($server);
        //Proccess information
        $response = json_decode($connection);
            //Return value
            return $response->address->{$this->field};
    }
}