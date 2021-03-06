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
            $crop   = $client->crop->all();
            return collect([
                'client' => [
                    'id'        => $client->id ?? null,
                    'name'      => $client->client_name ?? null,
                    'address'   => $client->client_address ?? null,
                    'nif'       => $client->client_nif ?? null,
                    'email'     => $client->client_email ?? null,
                    'zip'       => $client->client_zip ?? null,
                    'city'      => $client->client_city ?? null,
                    'region'    => $client->client_region ?? null,
                    'state'     => $client->client_state ?? null,
                    'country'   => $client->client_country ?? null,
                ],
                'menuBar' => [
                    (count($client->config->pluck('id')->all()) > 0) ? $client->config->pluck('config_key', 'id')->all() : null
                ],
                'crop' => [
                    'id'        => $crop[0]['id'],
                    'name'      => $crop[0]['crop_name'],
                    'module'    => $crop[0]['crop_module'],
                    'type'      => $crop[0]['crop_type'] ? true : false,
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
