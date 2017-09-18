<?php

namespace App\DataTables\ClimaticStations;

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
            $this->setColumn(trans('base.reference'), 'station_reference'),
            $this->setColumn(sections('climatic_stations.aemet'), 'station_reference_by_city', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans_title('climatic_stations'), 'station_name'),
            $this->setColumn(trans('persona.city'), 'station_city_name'),
            $this->setColumn(trans('geolocations.lat'), 'station_lat'),
            $this->setColumn(trans('geolocations.lng'), 'station_lng'),
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