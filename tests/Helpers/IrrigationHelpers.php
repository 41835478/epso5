<?php 

namespace Tests\Helpers;

use App\Repositories\Irrigations\Irrigation;

trait IrrigationHelpers
{    
    protected $firstIrrigation;
    protected $lastIrrigation;
    protected $makeIrrigation;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeIrrigation() : Irrigation
    {
        if($this->makeIrrigation) {
            return $this->makeIrrigation;
        }
        return $this->makeIrrigation = factory(Irrigation::class)->make();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastIrrigation() : Irrigation
    {
        if($this->lastIrrigation) {
            return $this->lastIrrigation;
        }
        return $this->lastIrrigation = Irrigation::orderBy('id', 'desc')->first();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function firstIrrigation() : Irrigation
    {
        if($this->firstIrrigation) {
            return $this->firstIrrigation;
        }
        return $this->firstIrrigation = Irrigation::orderBy('id', 'asc')->first();
    }
}