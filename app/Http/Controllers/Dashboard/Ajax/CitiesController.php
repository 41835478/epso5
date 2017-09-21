<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Cities\CitiesRepository;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(CitiesRepository $cities)
    {
        return $cities->ajax(
            $id         = request('query'), 
            $region     = request('region'), 
            $columns    = ['id', 'city_name AS name']);
    }
}
