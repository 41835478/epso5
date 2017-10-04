<?php

namespace App\DataTables\Workers;

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
            $this->setColumnSearch('input', 'search_worker', 2),
            $this->setColumnSearch('input', 'search_nif', 3),
            $this->setColumnSearch('input', 'search_ropo', 5),
            $this->setColumnSearch('select', 'search_level', 7),
            $this->setColumnSearch('input', 'search_client', 9),
            $this->setColumnSearch('input', 'search_user', 10),
        ];
    }
}