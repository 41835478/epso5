<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicHarvests\AgronomicHarvest;

trait AgronomicHarvestHelpers
{    
    protected $createAgronomicHarvest;
    protected $firstAgronomicHarvest;
    protected $lastAgronomicHarvest;
    protected $makeAgronomicHarvest;
    protected $notThisClientAgronomicHarvest;
    protected $userAgronomicHarvest;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createAgronomicHarvest() : AgronomicHarvest
    {
        if($this->createAgronomicHarvest) {
            return $this->createAgronomicHarvest;
        }
        return $this->createAgronomicHarvest = factory(AgronomicHarvest::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeAgronomicHarvest() : AgronomicHarvest
    {
        if($this->makeAgronomicHarvest) {
            return $this->makeAgronomicHarvest;
        }
        return $this->makeAgronomicHarvest = factory(AgronomicHarvest::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastAgronomicHarvest() : AgronomicHarvest
    {
        if($this->lastAgronomicHarvest) {
            return $this->lastAgronomicHarvest;
        }
        return $this->lastAgronomicHarvest = AgronomicHarvest::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstAgronomicHarvest() : AgronomicHarvest
    {
        if($this->firstAgronomicHarvest) {
            return $this->firstAgronomicHarvest;
        }
        return $this->firstAgronomicHarvest = AgronomicHarvest::orderBy('id', 'asc')->first();
    }

    /**
     * Filter by client
     * @param int $client
     * 
     * @return Object
     */
    public function notThisClientAgronomicHarvest($client) : AgronomicHarvest
    {
        if($this->notThisClientAgronomicHarvest) {
            return $this->notThisClientAgronomicHarvest;
        }
        return $this->notThisClientAgronomicHarvest = AgronomicHarvest::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }

    /**
     * List item by user
     * @param int $user
     * 
     * @return Object
     */
    public function userAgronomicHarvest($user) : AgronomicHarvest
    {
        if($this->userAgronomicHarvest) {
            return $this->userAgronomicHarvest;
        }
        return $this->userAgronomicHarvest = AgronomicHarvest::whereUserId($user)->inRandomOrder()->first();
    }
}