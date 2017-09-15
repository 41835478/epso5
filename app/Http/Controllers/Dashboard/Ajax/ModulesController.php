<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Clients\ClientsRepository;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    protected $errorMessage = 'error';

    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(ClientsRepository $clients)
    {
        if(is_numeric(request('client'))) {
            $client = $clients->find(request('client'));
            $module = $client->crop->all();
            $response = [
                'id'        => ($module[0]['id'] ?? $this->errorMessage),
                'name'      => ($module[0]['crop_name'] ?? $this->errorMessage), 
                'module'    => ($module[0]['crop_module'] ?? $this->errorMessage), 
            ];
            return response()->json($response);
        }
        return response()->json([]);
    }
}
