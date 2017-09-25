<?php 

namespace App\Services\Geolocation;

trait GeolocationTrait {

    /**
    * Set variable bbox
    * @param string $bbox
    * 
    * @return object.
    */
    public function bbox($bbox)
    {
        $this->bbox = $bbox;
            return $this;
    }

    /**
    * Set variable crs
    * @param string $crs
    * 
    * @return object.
    */
    public function crs($crs)
    {
        $this->crs = $crs;
            return $this;
    }

    /**
    * Set variable format
    * @param string $format
    * 
    * @return object.
    */
    public function format($format)
    {
        $this->format = $format;
            return $this;
    }

    /**
    * Set variable height
    * @param string $height
    * 
    * @return object.
    */
    public function height($height)
    {
        $this->height = $height;
            return $this;
    }

    /**
    * Set variable imageFormat
    * @param string $imageFormat
    * 
    * @return object.
    */
    public function imageFormat($imageFormat)
    {
        $this->imageFormat = $imageFormat;
            return $this;
    }

    /**
    * Set variable layers
    * @param string $layers
    * 
    * @return object.
    */
    public function layers($layers)
    {
        $this->layers = $layers;
            return $this;
    }

    /**
    * Set variable pointY
    * @param string $pointX
    * 
    * @return object.
    */
    public function pointX($pointX)
    {
        $this->pointX = $pointX;
            return $this;
    }

    /**
    * Set variable pointY
    * @param string $pointY
    * 
    * @return object.
    */
    public function pointY($pointY)
    {
        $this->pointY = $pointY;
            return $this;
    }

    /**
    * Set variable version
    * @param string $version
    * 
    * @return object.
    */
    public function version($version)
    {
        $this->version = $version;
            return $this;
    }

    /**
    * Set variable width
    * @param string $width
    * 
    * @return object.
    */
    public function width($width)
    {
        $this->width = $width;
            return $this;
    }
}
