<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Cities\City;
use App\Repositories\Regions\Region;
use DB;

class TestController extends DashboardController
{
    /**
     * @var protected
     */
    protected $key = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJkYW1pYW4uYWd1aWxhcm1AZ21haWwuY29tIiwianRpIjoiYWM2ZGIxZTYtYmM5YS00ZGYxLTg5MjItYjZlY2JmOTNlY2JlIiwiaXNzIjoiQUVNRVQiLCJpYXQiOjE1MDU2NDI1MDQsInVzZXJJZCI6ImFjNmRiMWU2LWJjOWEtNGRmMS04OTIyLWI2ZWNiZjkzZWNiZSIsInJvbGUiOiIifQ.pr4MlIfkwzSt2bCuMW7wpURUVMVCyS2YaZwssYBuSU4';
    protected $url = 'https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones';
    protected $timeout = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $cities = City::where('aemet_id', null)->get();
        foreach($cities as $city) {
            $aemet = DB::table('municipios')->where('nombre', 'LIKE', '%' . $city->city_name . '%')->first()->codigo ?? null;
            if($aemet) {
                City::where('id', $city->id)->update(['aemet_id' => $aemet]);
            }
        } 
    }

    public function aemet()
    {
       $cities = City::all();
       foreach($cities as $city) {
           $aemet = DB::table('municipios')->where('nombre', 'LIKE', '%' . $city->city_name . '%')->first();
           if($aemet) {
               City::where('id', $city->id)->update(['aemet_id' => $aemet->codigo]);
           }
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
            'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1',
            'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
            'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16'
        ];
        return array_rand($list, 1);
    }
}
