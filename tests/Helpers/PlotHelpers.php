<?php 

namespace Tests\Helpers;

use App\Repositories\Plots\Plot;

trait PlotHelpers
{    
    protected $createPlot;
    protected $firstPlot;
    protected $lastPlot;
    protected $makePlot;
    protected $whereClientIs;
    protected $whereClientIsNot;
    protected $whereUserIs;
    protected $whereUserIsNot;

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
     * Where client is
     *
     * @return Object
     */
    public function whereClientIs($plot) : Plot
    {
        if($this->whereClientIs) {
            return $this->whereClientIs;
        }
        return $this->whereClientIs = Plot::where('client_id', $plot->client_id)->inRandomOrder()->first();
    }

    /**
     * Where client is not
     *
     * @return Object
     */
    public function whereClientIsNot($plot) : Plot
    {
        if($this->whereClientIsNot) {
            return $this->whereClientIsNot;
        }
        return $this->whereClientIsNot = Plot::where('client_id', '!=', $plot->client_id)->inRandomOrder()->first();
    }

    /**
     * Where client is not
     *
     * @return Object
     */
    public function whereUserIs($user) : Plot
    {
        if($this->whereUserIs) {
            return $this->whereUserIs;
        }
        return $this->whereUserIs = Plot::where('user_id', $user->id)->inRandomOrder()->first();
    }

    /**
     * Where client is not
     *
     * @return Object
     */
    public function whereUserIsNot($user) : Plot
    {
        if($this->whereUserIsNot) {
            return $this->whereUserIsNot;
        }
        return $this->whereUserIsNot = Plot::where('user_id', '!=', $user->id)->inRandomOrder()->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Format the framework value
     *
     * @return string
     */
    protected function framework($string)
    {
        return substr($string, 0 , 1) . 'x' . substr($string, 1 , 1);
    }

    /**
     * Format the framework value
     *
     * @return string
     */
    protected function area($plot)
    {
        $area = ($plot->plot_area / 100) * $plot->plot_percent_cultivated_land;
            return number_format($area, 2, '.', '');
    }
}