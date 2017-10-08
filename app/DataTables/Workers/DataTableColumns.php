<?php

namespace App\DataTables\Workers;

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
            $this->setColumn(trans('financials.id'), 'id')
        ];

        /**
         * Columns
         */
        $columns = [
            $this->setColumn(trans_title('workers'), 'worker_name', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('persona.id.nif'), 'worker_nif', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('dates.date:work'), 'worker_start', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('workers.ropo'), 'worker_ropo', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('workers.ropo:date'), 'worker_ropo_date', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('workers.level'), 'worker_ropo_level'),
            $this->setColumn(trans('base.description'), 'worker_observations'),
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