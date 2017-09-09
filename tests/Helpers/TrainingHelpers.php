<?php 

namespace Tests\Helpers;

use App\Repositories\Trainings\Training;

trait TrainingHelpers
{    
    protected $firstTraining;
    protected $lastTraining;
    protected $makeTraining;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function makeTraining() : Training
    {
        if($this->makeTraining) {
            return $this->makeTraining;
        }
        return $this->makeTraining = factory(Training::class)->make();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function lastTraining() : Training
    {
        if($this->lastTraining) {
            return $this->lastTraining;
        }
        return $this->lastTraining = Training::orderBy('id', 'desc')->first();
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $id
     *
     * @return Object
     */
    public function firstTraining() : Training
    {
        if($this->firstTraining) {
            return $this->firstTraining;
        }
        return $this->firstTraining = Training::orderBy('id', 'asc')->first();
    }
}