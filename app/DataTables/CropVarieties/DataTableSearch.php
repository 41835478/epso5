<?php

namespace App\DataTables\CropVarieties;

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
            $this->setColumnSearch('input', 'search_variety', 2),
            $this->setColumnSearch('input', 'search_type', 3),
        ];
    }
}