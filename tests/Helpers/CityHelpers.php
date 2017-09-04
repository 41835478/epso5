<?php 

namespace Tests\Helpers;

use App\Repositories\Cities\City;

trait CityHelpers
{    
    protected $lastCity;
    protected $makeCity;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeCity() : City
    {
        if($this->makeCity) {
            return $this->makeCity;
        }
        return $this->makeCity = factory(City::class)->make();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastCity() : City
    {
        if($this->lastCity) {
            return $this->lastCity;
        }
        return $this->lastCity = City::latest()->first();
    }
}