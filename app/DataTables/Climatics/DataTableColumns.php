<?php

namespace App\DataTables\Climatics;

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
            $this->setColumnWithRelationship(trans_title('climatic_stations', 'singular'), 'station.station_id'),
            $this->setColumn(trans('base.reference'), 'station_reference'),
            $this->setColumn(trans('dates.date'), 'climatic_date'),
            $this->setColumn(trans('dates.date'), 'climatic_precipIntensity'),
            $this->setColumn(trans('dates.date'), 'climatic_temperature'),
            $this->setColumn(trans('dates.date'), 'climatic_temperatureMin'),
            $this->setColumn(trans('dates.date'), 'climatic_temperatureMinHour'),
            $this->setColumn(trans('dates.date'), 'climatic_temperatureMax'),
            $this->setColumn(trans('dates.date'), 'climatic_temperatureMaxHour'),
            $this->setColumn(trans('dates.date'), 'climatic_windSpeed'),
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