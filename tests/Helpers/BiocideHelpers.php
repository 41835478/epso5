<?php 

namespace Tests\Helpers;

use App\Repositories\Biocides\Biocide;

trait BiocideHelpers
{    
    protected $lastBiocide;
    protected $makeBiocide;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeBiocide() : Biocide
    {
        if($this->makeBiocide) {
            return $this->makeBiocide;
        }
        return $this->makeBiocide = factory(Biocide::class)->make();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastBiocide() : Biocide
    {
        if($this->lastBiocide) {
            return $this->lastBiocide;
        }
        return $this->lastBiocide = Biocide::latest()->first();
    }
}