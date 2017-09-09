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

    /**
     * Sync with all the relationships
     * @param   object $id
     * @return  boolean
     */
    private function syncRelationships($item)
    {
        if($item) {
            $item->config()->sync(request('config_id'));
            $item->crop()->sync(request('crop_id'));
            $item->irrigation()->sync(request('irrigation_id'));
            $item->region()->sync(request('region_id'));
            $item->training()->sync(request('training_id'));
        }
    }
}
