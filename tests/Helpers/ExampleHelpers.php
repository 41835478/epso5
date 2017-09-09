<?php 

namespace Tests\Helpers;

use App\Repositories\Examples\Example;

trait ExampleHelpers
{    
    protected $createExample;
    protected $firstExample;
    protected $lastExample;
    protected $makeExample;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createExample() : Example
    {
        if($this->createExample) {
            return $this->createExample;
        }
        return $this->createExample = factory(Example::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeExample() : Example
    {
        if($this->makeExample) {
            return $this->makeExample;
        }
        return $this->makeExample = factory(Example::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastExample() : Example
    {
        if($this->lastExample) {
            return $this->lastExample;
        }
        return $this->lastExample = Example::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstExample() : Example
    {
        if($this->firstExample) {
            return $this->firstExample;
        }
        return $this->firstExample = Example::orderBy('id', 'asc')->first();
    }
}