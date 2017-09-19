<?php 

namespace App\Repositories\Climatics\Api;

use App\Repositories\Climatics\Api\ClimaticContract as Service;

class ClimaticApi {

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function execute($time = null)
    {
        return $this->service->server();
    }
}
