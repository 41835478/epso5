<?php

namespace App\DataTables\Machines;

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
        /**
        * Default values
        */
        return [
            $this->setColumnSearch('input', 'search_machine', 1 + $value),
            $this->setColumnSearch('input', 'search_brand', 2 + $value),
            $this->setColumnSearch('input', 'search_model', 3 + $value),
            //
            $this->setColumnSearch('input', 'search_client', 2),
            $this->setColumnSearch('input', 'search_user', 1 + $value),
        ];
    }
}