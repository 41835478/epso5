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
            return response()->json($module[0]['crop_module'] ?? null);
    }
}
