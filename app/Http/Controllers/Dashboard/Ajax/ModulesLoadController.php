<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Patterns\PatternsRepository;
use Illuminate\Http\Request;

class ModulesLoadController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(ClientsRepository $client, CropVarietyTypesRepository $type, PatternsRepository $pattern)
    {
        $clientId       = request('client');
        $cropId         = request('cropId');
        $cropName       = request('cropName');
        $module         = request('module');

        if($cropId && $cropName && $module) {
            $cropPatterns   = $pattern->selectByCrop($cropId) ?? [];
            $cropTypes      = $type->selectByCrop($cropId) ?? [];
            $cropVarieties  = [];
            $cropTrainig    = $client->find($clientId)->training->pluck('training_name', 'id')->toArray() ?? [];
                return view(module_path($module), compact('cropId', 'cropName', 'cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'module'));
        }
        return view(module_path('error'));
    }
}
