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
                'client_id'             => $client->id,
                'client_config'         => (count($client->config->pluck('config_key')->all()) > 0) ? $client->config->pluck('config_key')->all() : null,
                'client_crops'          => (count($client->crop->pluck('id')->all()) > 0) ? $client->crop->pluck('id')->all() : null,
                'client_irrigations'    => (count($client->irrigation->pluck('id')->all()) > 0) ? $client->irrigation->pluck('id')->all() : null,
                'client_regions'        => (count($client->region->pluck('id')->all()) > 0) ? $client->region->pluck('id')->all() : null,
                'client_trainings'      => (count($client->training->pluck('id')->all()) > 0) ? $client->training->pluck('id')->all() : null,
            ];
        });
    } 
}
