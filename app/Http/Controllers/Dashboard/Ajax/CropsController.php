<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Clients\Client;
use Illuminate\Http\Request;

class CropsController extends Controller
{
    /**
     * Get an ajax response: get the crop id throw the client
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(Client $client)
    {
        return $client->find(request('search'))->crop->pluck('id');
    }
}
