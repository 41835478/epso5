<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicIrrigations\AgronomicIrrigation;

trait AgronomicIrrigationHelpers
{    
    protected $createAgronomicIrrigation;
    protected $firstAgronomicIrrigation;
    protected $lastAgronomicIrrigation;
    protected $makeAgronomicIrrigation;
    protected $notThisClientAgronomicIrrigation;
    protected $userAgronomicIrrigation;

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

    /**
     * Firt created item
     *
     * @return Object
     */
    public function notThisClientAgronomicIrrigation($client) : AgronomicIrrigation
    {
        if($this->notThisClientAgronomicIrrigation) {
            return $this->notThisClientAgronomicIrrigation;
        }
        return $this->notThisClientAgronomicIrrigation = AgronomicIrrigation::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }

    /**
     * List item by user
     *
     * @return Object
     */
    public function userAgronomicIrrigation($user) : AgronomicIrrigation
    {
        if($this->userAgronomicIrrigation) {
            return $this->userAgronomicIrrigation;
        }
        return $this->userAgronomicIrrigation = AgronomicIrrigation::whereUserId($user)->inRandomOrder()->first();
    }
}