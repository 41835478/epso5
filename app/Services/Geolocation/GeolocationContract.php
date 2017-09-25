<?php 

namespace App\Services\Geolocation;

interface GeolocationContract {
    
    /**
     * Create a url from the server
     *
     * @param object $request
     * @return string
     */
    public function server($request);

    /**
     * Execute the class
     *
     * @param object $request
     * @return string
     */
    public function handler($request);
}
