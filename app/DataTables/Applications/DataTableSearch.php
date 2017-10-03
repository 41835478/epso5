<?php

namespace App\DataTables\Applications;

trait DataTableSearch
{
    /**
     * Create the search attributes
     * @return array
     */
    public function searchAttributes() : array
    {
        /**
         * @param  string $type         [Allowed filter: change, input, number, select (same as change but with scapeRegex), date]
         * @param  string $container    [Input id]
         * @param  array $column        [Column number to search]
         */
        return [
            // $this->setColumnSearch('number', 'search_id', 1),
            // $this->setColumnSearch('change', 'search_role', 2),
            // $this->setColumnSearch('input', 'search_client', 3),
            // $this->setColumnSearch('input', 'search_name', 4),
            // $this->setColumnSearch('input', 'search_email', 5),
        ];
    }
}