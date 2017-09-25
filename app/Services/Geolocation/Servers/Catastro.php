<?php 

namespace App\Services\Geolocation\Servers;

use App\Services\Geolocation\GeolocationContract;
use App\Services\Geolocation\GeolocationRepository;

class Catastro extends GeolocationRepository implements GeolocationContract {

    protected $server = 'http://ovc.catastro.meh.es/Cartografia/WMS/ServidorWMS.aspx';

    //Required variables: bbox, width, height, pointX, pointY
    public function server($request) {
        return $this
            ->bbox($request->geo_bbox)
            ->width($request->frame_width)
            ->height($request->frame_height)
            ->pointX($request->geo_x)
            ->pointY($request->geo_y)
            ->getServer($this->server);
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
        preg_match_all('/<a\shref=\"([^\"]*)\">(.*)<\/a>/siU', $connection, $reference);
        preg_match_all('/<a href="(.*?)"/s', $connection, $url);
            //Get the value
            return (!empty($reference[2][0])) 
                ? collect(['reference' => $reference[2][0], 'url' => $url[1][0]]) 
                : null;
    }
}