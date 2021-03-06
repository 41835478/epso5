<?php

namespace App\DataTables\ClimaticStations;

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
            $this->setColumnSearch('input', 'search_reference', 2),
            $this->setColumnSearch('input', 'search_aemet', 3),
            $this->setColumnSearch('input', 'search_name', 4),
        ];
    }
}