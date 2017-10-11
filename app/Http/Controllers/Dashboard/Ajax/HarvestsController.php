<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;

class HarvestsController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        //Get variable
        $module = request('module') ?? null;
        //Load view
        if ($module) {
            return view()->exists(module_path($module, 'harvest')) 
                ? view(module_path($module, 'harvest')) 
                : view(module_path('error'));
        }
        //View error
        return view(module_path('error'));
    }
}
