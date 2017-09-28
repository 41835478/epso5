<?php 

namespace Tests\Helpers;

use App\Repositories\Plots\Plot;

trait PlotHelpers
{    
    protected $createPlot;
    protected $firstPlot;
    protected $lastPlot;
    protected $makePlot;

    /**
     * Create an item and storing it
     *
     * @return Object
     */
    public function createPlot() : Plot
    {
        if($this->createPlot) {
            return $this->createPlot;
        }
        return $this->createPlot = factory(Plot::class)->create();
    }

    /**
     * Create an item but not storing it!!!
     *
     * @return Object
     */
    public function makePlot() : Plot
    {
        if($this->makePlot) {
            return $this->makePlot;
        }
        return $this->makePlot = factory(Plot::class)->make();
    }

    /**
     * Last item created
     *
     * @return Object
     */
    public function lastPlot() : Plot
    {
        if($this->lastPlot) {
            return $this->lastPlot;
        }
        return $this->lastPlot = Plot::orderBy('id', 'desc')->first();
    }

    /**
     * Firt created item
     *
     * @return Object
     */
    public function firstPlot() : Plot
    {
        if($this->firstPlot) {
            return $this->firstPlot;
        }
        return $this->firstPlot = Plot::orderBy('id', 'asc')->first();
    }

    /**
     * Format the framework value
     *
     * @return string
     */
    public function framework($string)
    {
        return substr($string, 0 , 1) . 'x' . substr($string, 1 , 1);
    }
}