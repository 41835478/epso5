<?php 
/**
 * Available methods: 
    * config()
 */

namespace App\Services\Credentials\Traits;

use App\Repositories\Clients\ClientsRepository;
use Cache;

trait Config
{
    /**
     * Create a config cache for the client
     * @param int $model [The field database model]
     * @return boolean
     */
    private function config()
    {        
        return Cache::rememberForever('cache-client-' . $this->client(), function() {
            $client = app(ClientsRepository::class)->find($this->client());
            return [
                'client_id'         => $client->id,
                'client_crops'      => $client->crop->pluck('id')->all(),
                'client_regions'    => $client->region->pluck('id')->all(),
            ];
        });
    } 
}
