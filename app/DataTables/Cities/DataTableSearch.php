<?php

namespace App\DataTables\Cities;

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
            $this->setColumnSearch('input', 'search_country', 6),
            $this->setColumnSearch('input', 'search_state', 7),
            $this->setColumnSearch('input', 'search_region', 8),
            $this->setColumnSearch('input', 'search_city', 3),
        ];
    }
}