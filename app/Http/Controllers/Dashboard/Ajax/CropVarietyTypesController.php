<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CropVarietyTypesController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(CropVarietyTypesRepository $cropsVarietyTypes)
    {
        return $cropsVarietyTypes->ajax(
            $id         = request('cropId'), 
            $columns    = ['crop_variety_type AS type', 'crop_variety_name AS name']);
    }
}
