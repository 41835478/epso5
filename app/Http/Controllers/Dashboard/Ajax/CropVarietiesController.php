<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use Illuminate\Http\Request;

class CropVarietiesController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(CropVarietiesRepository $varieties)
    {
        return $varieties->ajaxByCrop(
            $crop       = request('crop'), 
            $type       = request('type'), 
            $columns    = ['id', 'crop_variety_name AS name']);
    }
}
