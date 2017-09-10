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
        //Default values
        $client = $user = 0;
        //Filtering by role
        if(Credentials::isAdmin()) {
            $client = 1; $user = 2; $crop = 3; $variety = 4; $plot = 5; $city = 8;
        } elseif(Credentials::isEditor()) {
            $user = 1; $crop = 2; $variety = 3; $plot = 4; $city = 7;
        } else {
            $crop = 1; $variety = 2; $plot = 3; $city = 6;
        }

        /**
         * @param  string $type         [Allowed filter: change, input, number, select (same as change but with scapeRegex), date]
         * @param  string $container    [Input id]
         * @param  array $column        [Column number to search]
         */
        return [
            $this->setColumnSearch('input', 'search_client', $client),
            $this->setColumnSearch('input', 'search_crop', $crop),
            $this->setColumnSearch('input', 'search_user', $user),
            $this->setColumnSearch('input', 'search_plot', $plot),
            $this->setColumnSearch('input', 'search_variety', $variety),
            $this->setColumnSearch('input', 'search_city', $city),
        ];
    }
}