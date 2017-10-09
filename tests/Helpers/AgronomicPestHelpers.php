<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicPests\AgronomicPest;

trait AgronomicPestHelpers
{    
    protected $createAgronomicPest;
    protected $firstAgronomicPest;
    protected $lastAgronomicPest;
    protected $makeAgronomicPest;
    protected $notThisClientAgronomicPest;
    protected $userAgronomicPest;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createAgronomicPest() : AgronomicPest
    {
        if($this->createAgronomicPest) {
            return $this->createAgronomicPest;
        }
        return $this->createAgronomicPest = factory(AgronomicPest::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeAgronomicPest() : AgronomicPest
    {
        if($this->makeAgronomicPest) {
            return $this->makeAgronomicPest;
        }
        return $this->makeAgronomicPest = factory(AgronomicPest::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastAgronomicPest() : AgronomicPest
    {
        if($this->lastAgronomicPest) {
            return $this->lastAgronomicPest;
        }
        return $this->lastAgronomicPest = AgronomicPest::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstAgronomicPest() : AgronomicPest
    {
        if($this->firstAgronomicPest) {
            return $this->firstAgronomicPest;
        }
        return $this->firstAgronomicPest = AgronomicPest::orderBy('id', 'asc')->first();
    }

    /**
     * Filter by client
     * @param int $client
     * 
     * @return Object
     */
    public function notThisClientAgronomicPest($client) : AgronomicPest
    {
        if($this->notThisClientAgronomicPest) {
            return $this->notThisClientAgronomicPest;
        }
        return $this->notThisClientAgronomicPest = AgronomicPest::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }

    /**
     * List item by user
     * @param int $user
     * 
     * @return Object
     */
    public function userAgronomicPest($user) : AgronomicPest
    {
        if($this->userAgronomicPest) {
            return $this->userAgronomicPest;
        }
        return $this->userAgronomicPest = AgronomicPest::whereUserId($user)->inRandomOrder()->first();
    }
}