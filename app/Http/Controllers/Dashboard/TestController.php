<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Cities\City;
use App\Repositories\Regions\Region;
use Carbon\Carbon;
use DB;

class TestController extends DashboardController
{
    /**
     * @var protected
     */
    protected $key          = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJkYW1pYW4uYWd1aWxhcm1AZ21haWwuY29tIiwianRpIjoiYWM2ZGIxZTYtYmM5YS00ZGYxLTg5MjItYjZlY2JmOTNlY2JlIiwiaXNzIjoiQUVNRVQiLCJpYXQiOjE1MDU2NDI1MDQsInVzZXJJZCI6ImFjNmRiMWU2LWJjOWEtNGRmMS04OTIyLWI2ZWNiZjkzZWNiZSIsInJvbGUiOiIifQ.pr4MlIfkwzSt2bCuMW7wpURUVMVCyS2YaZwssYBuSU4';
    protected $url          = 'https://opendata.aemet.es/opendata';
    protected $stations     = '/api/valores/climatologicos/inventarioestaciones/todasestaciones';
    protected $stationsData = '/api/valores/climatologicos/diarios/datos/fechaini/%s/fechafin/%s/estacion/%s';
    protected $timeStart    = 'T00:00:00UTC';
    protected $timeEnd      = 'T23:59:59UTC';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        dd($this->aemetStationData());
    }

    public function aemetStationData()
    {
        $dateStart = Carbon::create($year = 2016, $month = 10, $day = 1)->format('Y-m-d') . $this->timeStart;
        $dateEnd = Carbon::create($year = 2016, $month = 10, $day = 31)->format('Y-m-d') . $this->timeEnd;
        $station = '7244X';
        $url = sprintf($this->url('stationsData'), $dateStart, $dateEnd, $station);
        dd($this->conection($url));
    }

    public function aemetStations()
    {
        $url = $this->url('stations');
        dd($this->conection($url));
    }

    public function conection($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url . "/?api_key=" . $this->key,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }

     /**
     * Renerate an user agent to emulate an human user
     *
     * @return  String.
     */
    public function userAgent()
    {
        $list = [
            'Mozilla/5.0 (Windows CE) AppleWebKit/5350 (KHTML, like Gecko) Chrome/13.0.888.0 Safari/5350',
            'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_5) AppleWebKit/5312 (KHTML, like Gecko) Chrome/14.0.894.0 Safari/5312',
            'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20101231 Firefox/3.6',
            'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_1 rv:3.0; en-US) AppleWebKit/534.11.3 (KHTML, like Gecko) Version/4.0 Safari/534.11.3',
            'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1',
            'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
            'Opera/8.25 (Windows NT 5.1; en-US) Presto/2.9.188 Version/10.00',
            'Mozilla/5.0 (compatible; MSIE 7.0; Windows 98; Win 9x 4.90; Trident/3.0)',
            'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16'
        ];
        return array_rand($list, 1);
    }

    public function url($url)
    {
        return $this->url . $this->{$url};
    }
}
