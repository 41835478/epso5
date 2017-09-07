<?php

namespace App\Repositories\Clients\Traits;

trait ClientsHelpers {

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Filter and modify the request input
     * @return  array
     */
    private function requestOperations($request)
    {
        if(isset($request['stored_file'])) {
            $request['client_image'] = $this->images->disk('clients')->setName($request['row_id'])->handler();
        }
        //
        return $request;
    }
}
