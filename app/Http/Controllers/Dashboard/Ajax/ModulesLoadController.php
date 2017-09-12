<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModulesLoadController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        $moduleName = request('crop');
        return view(module_path(request('module')), compact('moduleName'));
    }
}
