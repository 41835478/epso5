<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicCulturals\AgronomicCultural;

trait AgronomicCulturalHelpers
{    
    protected $createAgronomicCultural;
    protected $firstAgronomicCultural;
    protected $lastAgronomicCultural;
    protected $makeAgronomicCultural;
    protected $notThisClientAgronomicCultural;
    protected $userAgronomicCultural;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createAgronomicCultural() : AgronomicCultural
    {
        if($this->createAgronomicCultural) {
            return $this->createAgronomicCultural;
        }
        return $this->createAgronomicCultural = factory(AgronomicCultural::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeAgronomicCultural() : AgronomicCultural
    {
        if($this->makeAgronomicCultural) {
            return $this->makeAgronomicCultural;
        }
        return $this->makeAgronomicCultural = factory(AgronomicCultural::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastAgronomicCultural() : AgronomicCultural
    {
        if($this->lastAgronomicCultural) {
            return $this->lastAgronomicCultural;
        }
        return $this->lastAgronomicCultural = AgronomicCultural::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstAgronomicCultural() : AgronomicCultural
    {
        if($this->firstAgronomicCultural) {
            return $this->firstAgronomicCultural;
        }
        return $this->firstAgronomicCultural = AgronomicCultural::orderBy('id', 'asc')->first();
    }

    /**
     * Filter by client
     * @param int $client
     * 
     * @return Object
     */
    public function notThisClientAgronomicCultural($client) : AgronomicCultural
    {
        if($this->notThisClientAgronomicCultural) {
            return $this->notThisClientAgronomicCultural;
        }
        return $this->notThisClientAgronomicCultural = AgronomicCultural::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }

    /**
     * List item by user
     * @param int $user
     * 
     * @return Object
     */
    public function userAgronomicCultural($user) : AgronomicCultural
    {
        if($this->userAgronomicCultural) {
            return $this->userAgronomicCultural;
        }
        return $this->userAgronomicCultural = AgronomicCultural::whereUserId($user)->inRandomOrder()->first();
    }
}