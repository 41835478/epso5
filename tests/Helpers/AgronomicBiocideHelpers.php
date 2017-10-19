<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicBiocides\AgronomicBiocide;

trait AgronomicBiocideHelpers
{    
    protected $createAgronomicBiocide;
    protected $firstAgronomicBiocide;
    protected $lastAgronomicBiocide;
    protected $makeAgronomicBiocide;
    protected $notThisClientAgronomicBiocide;
    protected $userAgronomicBiocide;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createAgronomicBiocide() : AgronomicBiocide
    {
        if($this->createAgronomicBiocide) {
            return $this->createAgronomicBiocide;
        }
        return $this->createAgronomicBiocide = factory(AgronomicBiocide::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeAgronomicBiocide() : AgronomicBiocide
    {
        if($this->makeAgronomicBiocide) {
            return $this->makeAgronomicBiocide;
        }
        return $this->makeAgronomicBiocide = factory(AgronomicBiocide::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastAgronomicBiocide() : AgronomicBiocide
    {
        if($this->lastAgronomicBiocide) {
            return $this->lastAgronomicBiocide;
        }
        return $this->lastAgronomicBiocide = AgronomicBiocide::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstAgronomicBiocide() : AgronomicBiocide
    {
        if($this->firstAgronomicBiocide) {
            return $this->firstAgronomicBiocide;
        }
        return $this->firstAgronomicBiocide = AgronomicBiocide::orderBy('id', 'asc')->first();
    }

    /**
     * Filter by client
     * @param int $client
     * 
     * @return Object
     */
    public function notThisClientAgronomicBiocide($client) : AgronomicBiocide
    {
        if($this->notThisClientAgronomicBiocide) {
            return $this->notThisClientAgronomicBiocide;
        }
        return $this->notThisClientAgronomicBiocide = AgronomicBiocide::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }

    /**
     * List item by user
     * @param int $user
     * 
     * @return Object
     */
    public function userAgronomicBiocide($user) : AgronomicBiocide
    {
        if($this->userAgronomicBiocide) {
            return $this->userAgronomicBiocide;
        }
        return $this->userAgronomicBiocide = AgronomicBiocide::whereUserId($user)->inRandomOrder()->first();
    }
}