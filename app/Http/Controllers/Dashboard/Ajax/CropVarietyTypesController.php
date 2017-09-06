<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Crops\CropsRepository;
use Illuminate\Http\Request;

class CropVarietyTypesController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(CropsRepository $crops, CropVarietyTypesRepository $cropsVarietyTypes)
    {
        $cropId     = request('crop');
        $cropName   = $crops->find($cropId)->crop_name;
        $cropData   = $cropsVarietyTypes->allByCrop($cropId);

        return view('dashboard.crop_variety_types.default', compact('cropId', 'cropName', 'cropData'));
    }
}
