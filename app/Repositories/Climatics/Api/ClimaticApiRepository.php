<?php 

namespace App\Repositories\Climatics\Api;

use Carbon\Carbon;

class ClimaticApiRepository {

    protected $_key;
    protected $_lat;
    protected $_lng;
    protected $_url;
    protected $_time;

    public function getAttribute($attribute = null)
    {
        return $attribute 
            ? $this->getFile()->get($attribute)
            : $this->getFile();
    }
    
    public function getFile()
    {
        $file = file_get_contents($this->getUrl());
            return collect(json_decode($file, true));
    }

    public function getUrl()
    {
        return sprintf($this->_url, $this->_key, $this->_lat, $this->_lng, ($this->_time ?? null));
    }

    public function time($date = null, $time = null)
    {
        $date = $date ? Carbon::createFromFormat('d/m/Y', $date) : Carbon::now();
        $time = $time ?? Carbon::now()->format('h:m:s');
        $this->_time = sprintf('%sT%s', $date->format('Y-m-d'), $time);
            return $this;
    }
}
