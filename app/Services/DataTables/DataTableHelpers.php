<?php

namespace App\Services\DataTables;

use Credentials;

trait DataTableHelpers
{
    protected $getValue;

    /**
     * Set value from the controller to the Datatable constructor
     * @param string $value
     * @return object
     */
    public function setValue($value) {
        $this->getValue = $value;
            return $this;
    }

    /**
     * Get value from the controller to the Datatable constructor
     * @param string $value
     * @return object
     */
    public function getValue($value = null) {
        return $this->getValue;
    }

    /**
     * Set value from the controller to the Datatable constructor
     * @param string $file
     * @return object
     */
    public function getAction($file = null) {
        if($file) {
            return action_path($file);
        }
        return $this->action 
            ? action_path($this->section) 
            : action_path();
    }

    /**
     * Set relationships by role
     * @return object
     */
    public function relationships()
    {
        //Filtering the relationships
        if(Credentials::isAdmin()) {
            return ['client', 'user', 'crop', 'plot'];
        } 
        //Filtering the relationships
        if(Credentials::isEditor()) {
            return ['user', 'plot'];
        } 
        return ['plot'];
    }
}