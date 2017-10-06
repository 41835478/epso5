<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicIrrigations\AgronomicIrrigation;

trait AgronomicIrrigationHelpers
{    
    protected $createAgronomicIrrigation;
    protected $firstAgronomicIrrigation;
    protected $lastAgronomicIrrigation;
    protected $makeAgronomicIrrigation;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createAgronomicIrrigation() : AgronomicIrrigation
    {
        if($this->createAgronomicIrrigation) {
            return $this->createAgronomicIrrigation;
        }
        return $this->createAgronomicIrrigation = factory(AgronomicIrrigation::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeAgronomicIrrigation() : AgronomicIrrigation
    {
        if($this->makeAgronomicIrrigation) {
            return $this->makeAgronomicIrrigation;
        }
        return $this->makeAgronomicIrrigation = factory(AgronomicIrrigation::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastAgronomicIrrigation() : AgronomicIrrigation
    {
        if($this->lastAgronomicIrrigation) {
            return $this->lastAgronomicIrrigation;
        }
        return $this->lastAgronomicIrrigation = AgronomicIrrigation::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstAgronomicIrrigation() : AgronomicIrrigation
    {
        if($this->firstAgronomicIrrigation) {
            return $this->firstAgronomicIrrigation;
        }
        return $this->firstAgronomicIrrigation = AgronomicIrrigation::orderBy('id', 'asc')->first();
    }
}