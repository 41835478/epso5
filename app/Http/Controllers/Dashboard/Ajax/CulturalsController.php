<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CulturalsController extends Controller
{
    /**
     * @var string
     */
    protected $route = 'dashboard.agronomic_culturals.forms.sections.%s';
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        if(request('cultural') && request('type')) {
            return view(sprintf($this->route, request('cultural')))
                ->withAgronomicType(request('type'));
        }
        return response()->json(null);
    }
}
