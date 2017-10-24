<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UsersRepository;
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
    public function __invoke(UsersRepository $users, WorkersRepository $workers)
    {
        //Only show if the client has this feature active
        $configure = $users->loadWorkers(request('search'));
        if(!in_array('workers', $configure)) {
            return response()->json(null);
        }
        //Return workers
        return $workers->ajax(
            $id         = request('search'), 
            $row        = 'user_id', 
            $columns    = ['id', 'worker_name As name']);
    }
}
