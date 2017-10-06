<?php

namespace App\DataTables\Workers;

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
        $value = Credentials::isAdmin() ? 3 : (Credentials::isEditor() ? 1 : 0);
        $user  = Credentials::isAdmin() ? 3 : 2;
        /**
         * Default values
         */
        return [
            $this->setColumnSearch('input', 'search_worker', 2 + $value),
            $this->setColumnSearch('input', 'search_nif', 3 + $value),
            $this->setColumnSearch('input', 'search_ropo', 5 + $value),
            $this->setColumnSearch('select', 'search_level', 7 + $value),
            //
            $this->setColumnSearch('input', 'search_client', 2),
            $this->setColumnSearch('input', 'search_user', $user),
        ];
    }
}