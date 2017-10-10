<?php

namespace App\DataTables\AgronomicIrrigations;

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
         * Default values
         */
        $default = [
            $this->createCheckbox(),
            $this->setColumn(trans('financials.id'), 'id'),
        ];
        $columns = [
            $this->setColumnWithRelationship(trans_title('plots', 'singular'), 'plot.plot_name', ['defaultContent' => no_result()]),
            $this->setColumn(trans('dates.date'), 'agronomic_date', ['defaultContent' => no_result()]),
            $this->setColumn(trans('units.quantity'), 'agronomic_quantity', ['defaultContent' => no_result()]),
            $this->setColumn(trans('base.observations'), 'agronomic_observations', ['defaultContent' => no_result()]),            
        ];
        /**
         * Filter by role
         */
        if(Credentials::isAdmin()) {
            return array_merge($default, [
                $this->setColumnWithRelationship(trans_title('clients', 'singular'), 'client.client_name', ['defaultContent' => no_result()]),
                $this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name', ['defaultContent' => no_result()]),
            ], $columns);
        }
        if(Credentials::isEditor()) {
            return array_merge($default, [
                $this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name', ['defaultContent' => no_result()]),
            ], $columns);
        }
        //Get the values
        return array_merge($default, $columns);
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