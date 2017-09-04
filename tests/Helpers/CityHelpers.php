<?php 

namespace Tests\Helpers;

use App\Repositories\Cities\City;

trait CityHelpers
{    
    protected $lastCity;
    protected $makeCity;
    protected $setLocalization;
    protected $setLocalizationByName;
    protected $_Places_ID = [1, 10, 52];
    protected $_Places_Name = ['España', 'Comunidad Valenciana', 'Murcia', 'Almàssera'];



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
        return $this->makeCity = factory(City::class)->make([
            'country_id'    => $this->_Places_ID[0],
            'state_id'      => $this->_Places_ID[1],
            'region_id'     => $this->_Places_ID[2],
        ]);
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

    public function setLocalization(string $type)
    {
        if($type === 'country') {
            return $this->_Places_ID[0];
        }
        if($type === 'state') {
            return $this->_Places_ID[1];
        }
        if($type === 'region') {
            return $this->_Places_ID[2];
        }
    }

    public function setLocalizationByName(string $type)
    {
        if($type === 'country') {
            return $this->_Places_Name[0];
        }
        if($type === 'state') {
            return $this->_Places_Name[1];
        }
        if($type === 'region') {
            return $this->_Places_Name[2];
        }
        if($type === 'city') {
            return $this->_Places_Name[3];
        }
    }
}