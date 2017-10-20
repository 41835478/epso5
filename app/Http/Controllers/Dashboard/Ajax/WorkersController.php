<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Workers\WorkersRepository;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(WorkersRepository $workers)
    {
        return $workers->ajax(
            $id         = request('search'), 
            $row        = 'user_id', 
            $columns    = ['id', 'worker_name As name']);
    }
}
