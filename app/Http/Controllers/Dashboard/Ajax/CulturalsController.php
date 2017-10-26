<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CulturalsController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        if(request('cultural') && request('type')) {
            return response()->json(request('type') . ' - ' . request('cultural'));
        }
        return response()->json(null);
    }
}
