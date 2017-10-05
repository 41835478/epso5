<?php

namespace App\DataTables\Plots;

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
         * @param  string $type         [Allowed filter: change, input, number, select (same as change but with scapeRegex), date]
         * @param  string $container    [Input id]
         * @param  array $column        [Column number to search]
         */
        return [
            $this->setColumnSearch('input', 'search_crop', 1 + $value),
            $this->setColumnSearch('input', 'search_variety', 2 + $value),
            $this->setColumnSearch('input', 'search_plot', 3 + $value),
            $this->setColumnSearch('input', 'search_city', 6 + $value),
            //
            $this->setColumnSearch('input', 'search_client', 1),
            $this->setColumnSearch('input', 'search_user', 0 + $value),


        ];
    }
}