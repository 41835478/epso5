<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(UsersRepository $users)
    {
        return $users->ajax(
            $id         = request('client'), 
            $row        = 'client_id', 
            $columns    = ['id', 'name']);
    }
}
