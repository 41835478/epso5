<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Regions\RegionsRepository;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(RegionsRepository $regions)
    {
        return $regions->ajax(
            $id         = request('search'), 
            $row        = 'state_id', 
            $columns    = ['id', 'region_name AS name']);
    }
}
