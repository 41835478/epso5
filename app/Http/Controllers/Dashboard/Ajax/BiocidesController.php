<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Biocides\BiocidesRepository;
use Illuminate\Http\Request;

class BiocidesController extends Controller
{
    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(BiocidesRepository $biocides)
    {
        return $biocides->ajax(
            $term       = request('biocide'), 
            $row        = 'biocide_name', 
            $columns    = []);
    }
}
