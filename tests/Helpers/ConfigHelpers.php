<?php 

namespace Tests\Helpers;

use App\Repositories\Configs\Config;

trait ConfigHelpers
{    
    protected $firstConfig;
    protected $lastConfig;
    protected $makeConfig;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeConfig() : Config
    {
        if($this->makeConfig) {
            return $this->makeConfig;
        }
        return $this->makeConfig = factory(Config::class)->make();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastConfig() : Config
    {
        if($this->lastConfig) {
            return $this->lastConfig;
        }
        return $this->lastConfig = Config::orderBy('id', 'desc')->first();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function firstConfig() : Config
    {
        if($this->firstConfig) {
            return $this->firstConfig;
        }
        return $this->firstConfig = Config::orderBy('id', 'asc')->first();
    }
}