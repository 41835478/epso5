<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Pests\PestsRepository;
use Illuminate\Http\Request;

class PestsController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(PestsRepository $pests)
    {
        return $pests->ajax(
            $id         = request('search'), 
            $row        = 'crop_id', 
            $columns    = ['id', 'pest_name As name']);
    }
}
