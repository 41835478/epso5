<?php

namespace App\Services\DataTables;

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
     * Set value from the controller to the Datatable constructor
     * @param string $value
     * @return object
     */
    public function getAction() {
        return $this->getValue['action'] 
            ? action_path($this->getValue['action']) 
            : action_path();
    }
}