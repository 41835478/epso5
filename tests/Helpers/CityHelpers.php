<?php 

namespace Tests\Helpers;

use App\Repositories\Cities\City;
use App\Repositories\Plots\Plot;

trait CityHelpers
{    
    protected $lastCity;
    protected $firstCityFromPlot;
    protected $lastCityFromPlot;
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
        return $this->lastCity = City::orderBy('id', 'desc')->first();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $type
     *
     * @return Object
     */
    public function firstCityFromPlot($type = 'id')
    {
        if($this->firstCityFromPlot) {
            return $this->firstCityFromPlot;
        }
        $id = Plot::select('city_id')->groupBy('city_id')->orderBy('id', 'asc')->first()->city_id;
        return ($type === 'id') ? $id : City::find($id)->city_name;
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $type
     *
     * @return Object
     */
    public function lastCityFromPlot($type = 'id')
    {
        if($this->lastCityFromPlot) {
            return $this->lastCityFromPlot;
        }
        $id = Plot::select('city_id')->groupBy('city_id')->orderBy('id', 'desc')->first()->city_id;
        return ($type === 'id') ? $id : City::find($id)->city_name;
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