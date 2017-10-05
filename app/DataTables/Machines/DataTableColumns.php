<?php

namespace App\DataTables\Machines;

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
        ];
        /**
         * Columns
         */
        $columns = [
            $this->setColumn(trans_title('machines', 'singular'), 'machine_equipment_name'),
            $this->setColumn(sections('machines.brand'), 'machine_brand', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('machines.model'), 'machine_model', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('dates.date:buy'), 'machine_date', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('machines.inspection:last'), 'machine_inspection', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('machines.inspection:next'), 'machine_next_inspection', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('machines.inspection:countdown'), 'machine_inspection_day', [
                'defaultContent'    => no_result(),
                'orderable'         => false,
            ]),
            $this->setColumn(trans('base.observations'), 'machine_observations', [
                'defaultContent' => no_result(),
            ]),
        ];
        /**
         * Filter by role
         */
        if(Credentials::isAdmin()) {
            return array_merge($default, [
                $this->setColumnWithRelationship(trans_title('clients', 'singular'), 'client.client_name'),
                $this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name'),
            ], $columns);
        }
        if(Credentials::isEditor()) {
            return array_merge($default, [
                $this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name'),
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