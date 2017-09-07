<?php 
/**
 * Available methods: 
    * route()
 */

namespace App\Services\Html\Traits;

trait Pipeline
{
    /**
     * Set the route value
     * @return this
     */
    public function route($route)
    {
        $this->route = $route;

        return $this; 
    }

    /**
     * Set the class values
     * @return this
     */
    public function class($class)
    {
        $this->class = $class;

        return $this; 
    }

    /**
     * Set the target value
     * @return this
     */
    public function target($target)
    {
        $this->target = $target;

        return $this; 
    }

    /**
     * Set the type value
     * @return this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this; 
    }

    /**
     * Set the width value
     * @return this
     */
    public function width($width)
    {
        $this->width = $width;

        return $this; 
    }

    /**
     * Set the folder value
     * @return this
     */
    public function folder($folder)
    {
        $this->folder = $folder;

        return $this; 
    }
}