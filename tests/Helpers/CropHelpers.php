<?php 

namespace Tests\Helpers;

use App\Repositories\Crops\Crop;

trait CropHelpers
{    
    protected $firstCrop;
    protected $secondCrop;
    protected $lastCrop;
    protected $makeCrop;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeCrop() : Crop
    {
        if($this->makeCrop) {
            return $this->makeCrop;
        }
        return $this->makeCrop = factory(Crop::class)->make();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function firstCrop() : Crop
    {
        if($this->firstCrop) {
            return $this->firstCrop;
        }
        return $this->firstCrop = Crop::find(1);
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function secondCrop() : Crop
    {
        if($this->secondCrop) {
            return $this->secondCrop;
        }
        return $this->secondCrop = Crop::find(2);
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastCrop() : Crop
    {
        if($this->lastCrop) {
            return $this->lastCrop;
        }
        return $this->lastCrop = Crop::orderBy('id', 'desc')->first();
    }
}