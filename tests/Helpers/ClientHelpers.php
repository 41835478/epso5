<?php 

namespace Tests\Helpers;

use App\Repositories\Clients\Client;

trait ClientHelpers
{    
    protected $createClientEpso;
    protected $createClientValencia;
    protected $lastClient;
    protected $makeClient;

    /**
     * Create a client for EPSO
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastClient() : Client
    {
        if($this->lastClient) {
            return $this->lastClient;
        }
        return $this->lastClient = Client::latest()->first();
    }

    /**
     * Create a client for EPSO
     *
     * @param  string $id
     *
     * @return Object
     */
    public function createClientEpso() : Client
    {
        if($this->createClientEpso) {
            return $this->createClientEpso;
        }
        return $this->createClientEpso = Client::find(1);
    }

    /**
     * Create a client for DO VALENCIA
     *
     * @param  string $id
     *
     * @return Object
     */
    public function createClientValencia() : Client
    {
        if($this->createClientValencia) {
            return $this->createClientValencia;
        }
        return $this->createClientValencia = Client::find(2);
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeClient() : Client
    {
        if($this->makeClient) {
            return $this->makeClient;
        }
        return $this->makeClient = factory(Client::class)->make();
    }
}