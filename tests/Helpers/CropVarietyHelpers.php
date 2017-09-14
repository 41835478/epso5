<?php 

namespace Tests\Helpers;

use App\Repositories\CropVarieties\CropVariety;

trait CropVarietyHelpers
{    
    protected $createCropVariety;
    protected $firstCropVariety;
    protected $lastCropVariety;
    protected $makeCropVariety;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createCropVariety() : CropVariety
    {
        if($this->createCropVariety) {
            return $this->createCropVariety;
        }
        return $this->createCropVariety = factory(CropVariety::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeCropVariety() : CropVariety
    {
        if($this->makeCropVariety) {
            return $this->makeCropVariety;
        }
        return $this->makeCropVariety = factory(CropVariety::class)->make();
    }

    /**
     * Last item created
     * @param integer $crop [The crop id]
     * @return Object
     */
    public function lastCropVariety($crop = 1) : CropVariety
    {
        if($this->lastCropVariety) {
            return $this->lastCropVariety;
        }
        return $this->lastCropVariety = CropVariety::where('crop_id', $crop)->orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     * @param integer $crop [The crop id]
     * @return Object
     */
    public function firstCropVariety($crop = 1) : CropVariety
    {
        if($this->firstCropVariety) {
            return $this->firstCropVariety;
        }
        return $this->firstCropVariety = CropVariety::where('crop_id', $crop)->orderBy('id', 'asc')->first();
    }
}