<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use Illuminate\Http\Request;

class ModulesLoadController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(CropVarietyTypesRepository $type)
    {
        $cropId         = request('cropId');
        $cropName       = request('cropName');
        $module         = request('module');
        $cropTypes      = $type->selectByCrop($cropId) ?? [];
        $cropVarieties  = [];

        return view(module_path($module), compact('cropId', 'cropName', 'cropTypes', 'cropVarieties', 'module'));
    }
}
