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
        $user  = Credentials::isAdmin() ? 3 : 2;
        /**
        * Default values
        */
        return [
            $this->setColumnSearch('input', 'search_machine', 2 + $value),
            $this->setColumnSearch('input', 'search_brand', 3 + $value),
            $this->setColumnSearch('input', 'search_model', 4 + $value),
            //
            $this->setColumnSearch('input', 'search_client', 2),
            $this->setColumnSearch('input', 'search_user', $user),
        ];
    }
}