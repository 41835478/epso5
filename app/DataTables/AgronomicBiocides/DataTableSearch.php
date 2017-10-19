<?php

namespace App\DataTables\AgronomicBiocides;

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
            $this->setColumnSearch('input', 'search_crop', 4),
            $this->setColumnSearch('input', 'search_plot', 2 + $value),
            $this->setColumnSearch('date', 'search_date', 3 + $value),
            $this->setColumnSearch('input', 'search_biocide', 4 + $value),
            //Add your custom values
            //     // $this->setColumnSearch('number', 'search_id', 1),
            //     // $this->setColumnSearch('change', 'search_role', 2),
            //     // $this->setColumnSearch('input', 'search_client', 3),
            //     // $this->setColumnSearch('input', 'search_name', 4),
            //     // $this->setColumnSearch('input', 'search_email', 5),
        ];
    }
}