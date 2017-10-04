<?php 

namespace Tests\Helpers;

use App\Repositories\Workers\Worker;

trait WorkerHelpers
{    
    protected $createWorker;
    protected $firstWorker;
    protected $lastWorker;
    protected $makeWorker;
    protected $workerNotThisClient;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createWorker() : Worker
    {
        if($this->createWorker) {
            return $this->createWorker;
        }
        return $this->createWorker = factory(Worker::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makeWorker() : Worker
    {
        if($this->makeWorker) {
            return $this->makeWorker;
        }
        return $this->makeWorker = factory(Worker::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastWorker() : Worker
    {
        if($this->lastWorker) {
            return $this->lastWorker;
        }
        return $this->lastWorker = Worker::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstWorker() : Worker
    {
        if($this->firstWorker) {
            return $this->firstWorker;
        }
        return $this->firstWorker = Worker::orderBy('id', 'asc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function workerNotThisClient($client) : Worker
    {
        if($this->workerNotThisClient) {
            return $this->workerNotThisClient;
        }
        return $this->workerNotThisClient = Worker::where('client_id', '!=', $client)->orderBy('id', 'asc')->first();
    }
}