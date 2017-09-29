<?php 

namespace Tests\Helpers;

use App\Repositories\Edaphologies\Edaphology;

trait EdaphologyHelpers
{    
    protected $createEdaphology;
    protected $firstEdaphology;
    protected $lastEdaphology;
    protected $makeEdaphology;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createEdaphology() : Edaphology
    {
        if($this->createEdaphology) {
            return $this->createEdaphology;
        }
        return $this->createEdaphology = factory(Edaphology::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeEdaphology() : Edaphology
    {
        if($this->makeEdaphology) {
            return $this->makeEdaphology;
        }
        return $this->makeEdaphology = factory(Edaphology::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastEdaphology() : Edaphology
    {
        if($this->lastEdaphology) {
            return $this->lastEdaphology;
        }
        return $this->lastEdaphology = Edaphology::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstEdaphology() : Edaphology
    {
        if($this->firstEdaphology) {
            return $this->firstEdaphology;
        }
        return $this->firstEdaphology = Edaphology::orderBy('id', 'asc')->first();
    }
}