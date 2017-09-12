<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Clients\ClientsRepository;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(ClientsRepository $clients)
    {
        $client = $clients->find(request('client'));
        $module = $client->crop->all();
        $response = [
            'module'    => ($module[0]['crop_module'] ?? null), 
            'id'        => ($module[0]['id'] ?? null)
        ];
            return response()->json($response);
    }
}
