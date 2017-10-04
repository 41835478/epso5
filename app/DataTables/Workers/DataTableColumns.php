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
         * @param  string $text
         * @param  string $name
         * @param  array $attributes [Add extra attributes]
         */
        $columns = [
            $this->createCheckbox(),
            $this->setColumn(trans('financials.id'), 'id'),
            $this->setColumn(trans_title('workers'), 'worker_name'),
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
        if(Credentials::isAdmin()) {
            return array_merge($columns, [
                $this->setColumnWithRelationship(trans_title('clients', 'singular'), 'client.client_name'),
                $this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name'),
            ]);
        }
        if(Credentials::isEditor()) {
            return array_merge($columns, [
                $this->setColumnWithRelationship(trans_title('users', 'singular'), 'user.name'),
            ]);
        }
        return $columns;
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