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
     * @return boolean
     */
    private function config()
    {        
        return Cache::rememberForever('cache-client-' . $this->client(), function() {
            $client = app(ClientsRepository::class)->find($this->client());
            $crop   = $client->crop->pluck('crop_name', 'id')->all();
            return collect([
                'client' => [
                    'id'    => $client->id,
                    'name'  => $client->client_name,
                ],
                'config' => [
                    (count($client->config->pluck('id')->all()) > 0) ? $client->config->pluck('config_key', 'id')->all() : null
                ],
                'crop' => [
                    'id'    => array_keys($crop),
                    'name'  => array_values($crop),
                ],
                'irrigation' => [
                    (count($client->irrigation->pluck('id')->all()) > 0) ? $client->irrigation->pluck('irrigation_name', 'id')->all() : null
                ],
                'region' => [
                    (count($client->region->pluck('id')->all()) > 0) ? $client->region->pluck('region_name', 'id')->all() : null
                ],
                'training' => [
                    (count($client->training->pluck('id')->all()) > 0) ? $client->training->pluck('training_name', 'id')->all() : null
                ],
            ]);
        });
    } 
}
