<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Plots\PlotsRepository;
use Illuminate\Http\Request;

class PlotsController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(PlotsRepository $plots)
    {
        return $plots->ajax(
            $id         = request('search'), 
            $row        = 'user_id', 
            $columns    = ['id', 'plot_name As name']);
    }
}
