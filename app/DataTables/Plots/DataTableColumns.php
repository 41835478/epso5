<?php

namespace App\DataTables\Plots;

use Credentials;

trait DataTableColumns
{
    /**
     * Get columns.
     * @return array
     */
    protected function setColumns() : array
    {
        /**
         * @param  string $text
         * @param  string $name
         * @param  array $attributes [Add extra attributes]
         */
        $client = [$this->setColumnWithRelationship(trans_title('clients', 'singular'), 'client.client_name')];
        $user   = [$this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name')];

        $columns = [
            $this->setColumnWithRelationship(trans_title('crops', 'singular'), 'crop.crop_name'),
            $this->setColumnWithRelationship(trans_title('crop_varieties', 'singular'), 'crop_variety.crop_variety_name'),
            $this->setColumn(trans_title('plots'), 'plot_name'),
            $this->setColumnWithRelationship(trans('persona.region'), 'region.region_name'),
            $this->setColumnWithRelationship(trans('persona.city'), 'city.city_name'),
            $this->setColumn(trans('units.area'), 'plot_area'),
        ];
        if(Credentials::isAdmin()) {
            return array_merge([$this->createCheckbox()], $client, $user, $columns);
        }
        if(Credentials::isEditor()) {
            return array_merge([$this->createCheckbox()], $user, $columns);
        }
        return array_merge([$this->createCheckbox()], $columns);
    }

    /**
     * Show / hide columns by group.
     * @return array
     */
    protected function setColumnsGroups() : array
    {
        return [
            //$this->createColumnsGroupsAll(),
            // $this->createColumnsGroups(icon('user', trans('tables.button:personal')), [
            //     'show' => [0, 2, 3, 4, 5, 6],
            //     'hide' => [1, 7, 8, 9],
            // ]),
            // $this->createColumnsGroups(icon('social', trans('tables.button:social')), [
            //     'show' => [0, 7, 8, 9],
            //     'hide' => [1, 2, 3, 4, 5, 6],
            // ]),
        ];
    }
}