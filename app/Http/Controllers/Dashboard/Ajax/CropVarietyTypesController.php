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
        $cropID     = request('crop');
        $cropName   = $crops->find($cropID)->crop_name;
        $data       = $cropsVarietyTypes->allByCrop($cropID);

        return view('dashboard.crop_variety_types.default', compact('cropID', 'cropName', 'data'));
    }
}
