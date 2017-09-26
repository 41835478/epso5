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
*/

namespace App\Services\Geolocation\Servers;

use App\Services\Geolocation\GeolocationContract;
use App\Services\Geolocation\GeolocationRepository;

class Geonames extends GeolocationRepository implements GeolocationContract {

    protected $server = 'http://api.geonames.org/astergdem';

    //Required variables: lat, lng, API_KEY
    public function server($request) {
        return $this->server . 
            '?lat=' . $request->geo_lat . 
            '&lng=' . $request->geo_lng . 
            '&username=' . getenv('API_KEY_GEONAMES');
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
           return parent::getFile($server) ?? null;
    }
}