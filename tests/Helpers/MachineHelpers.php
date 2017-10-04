<?php 

namespace Tests\Helpers;

use App\Repositories\Machines\Machine;

trait MachineHelpers
{    
    protected $createMachine;
    protected $firstMachine;
    protected $lastMachine;
    protected $makeMachine;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createMachine() : Machine
    {
        if($this->createMachine) {
            return $this->createMachine;
        }
        return $this->createMachine = factory(Machine::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeMachine() : Machine
    {
        if($this->makeMachine) {
            return $this->makeMachine;
        }
        return $this->makeMachine = factory(Machine::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastMachine() : Machine
    {
        if($this->lastMachine) {
            return $this->lastMachine;
        }
        return $this->lastMachine = Machine::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstMachine() : Machine
    {
        if($this->firstMachine) {
            return $this->firstMachine;
        }
        return $this->firstMachine = Machine::orderBy('id', 'asc')->first();
    }
}