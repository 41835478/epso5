<?php

namespace App\DataTables\AgronomicIrrigations;

use Credentials;

trait DataTableSearch
{
    /**
     * Create the search attributes
     * @return array
     */
    public function searchAttributes() : array
    {
        /**
        * Role filter
        */
        $value = Credentials::isAdmin() ? 2 : (Credentials::isEditor() ? 1 : 0);
        $user  = Credentials::isAdmin() ? 3 : 2;
        /**
        * Default values
        */
        return [
            $this->setColumnSearch('input', 'search_user', $user),
            $this->setColumnSearch('input', 'search_client', 2),
            $this->setColumnSearch('input', 'search_plot', 2 + $value),
            $this->setColumnSearch('date', 'search_date', 3 + $value),
        ];
    }
}