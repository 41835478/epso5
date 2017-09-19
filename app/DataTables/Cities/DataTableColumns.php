<?php

namespace App\DataTables\Cities;

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
        return [
            $this->createCheckbox(),
            $this->setColumn(trans('financials.id'), 'id'),
            $this->setColumn(trans('base.ine'), 'ine_id', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans_title('cities', 'singular'), 'city_name'),
            $this->setColumn(trans('base.latitude'), 'city_lat'),
            $this->setColumn(trans('base.longitude'), 'city_lng'),
            $this->setColumnWithRelationship(trans('persona.country'), 'country.country_name'),
            $this->setColumnWithRelationship(trans('persona.state'), 'state.state_name'),
            $this->setColumnWithRelationship(trans('persona.region'), 'region.region_name'),
        ];
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