<?php 

namespace Tests\Helpers;

use App\Repositories\AgronomicIncidents\AgronomicIncident;

trait AgronomicIncidentHelpers
{    
    protected $createAgronomicIncident;
    protected $firstAgronomicIncident;
    protected $lastAgronomicIncident;
    protected $makeAgronomicIncident;
    protected $notThisClientAgronomicIncident;
    protected $userAgronomicIncident;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createAgronomicIncident() : AgronomicIncident
    {
        if($this->createAgronomicIncident) {
            return $this->createAgronomicIncident;
        }
        return $this->createAgronomicIncident = factory(AgronomicIncident::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeAgronomicIncident() : AgronomicIncident
    {
        if($this->makeAgronomicIncident) {
            return $this->makeAgronomicIncident;
        }
        return $this->makeAgronomicIncident = factory(AgronomicIncident::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastAgronomicIncident() : AgronomicIncident
    {
        if($this->lastAgronomicIncident) {
            return $this->lastAgronomicIncident;
        }
        return $this->lastAgronomicIncident = AgronomicIncident::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstAgronomicIncident() : AgronomicIncident
    {
        if($this->firstAgronomicIncident) {
            return $this->firstAgronomicIncident;
        }
        return $this->firstAgronomicIncident = AgronomicIncident::orderBy('id', 'asc')->first();
    }

    /**
     * Filter by client
     * @param int $client
     * 
     * @return Object
     */
    public function notThisClientAgronomicIncident($client) : AgronomicIncident
    {
        if($this->notThisClientAgronomicIncident) {
            return $this->notThisClientAgronomicIncident;
        }
        return $this->notThisClientAgronomicIncident = AgronomicIncident::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }

    /**
     * List item by user
     * @param int $user
     * 
     * @return Object
     */
    public function userAgronomicIncident($user) : AgronomicIncident
    {
        if($this->userAgronomicIncident) {
            return $this->userAgronomicIncident;
        }
        return $this->userAgronomicIncident = AgronomicIncident::whereUserId($user)->inRandomOrder()->first();
    }
}