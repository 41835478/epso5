<?php 

namespace App\Repositories\Climatics\Api\Servers;

use App\Repositories\Climatics\Api\ClimaticApiRepository;
use App\Repositories\Climatics\Api\ClimaticContract;

class DarkSky extends ClimaticApiRepository implements ClimaticContract {

    protected $_key = '60b92cc3c79ec956880e98302086adfb';
    protected $_lat = '37.7388888889';
    protected $_lng = '-0.9675000000';
    protected $_url = 'https://api.darksky.net/forecast/%s/%s,%s?lang=es&units=si&exclude=minutely,hourly,daily,alerts,flags?time=%s';

    public function server()
    {
        //$date = Carbon::createFromTimestamp(1505977200)->format('d-m-Y h:m');
        return dd($this->getAttribute());
    }
}