<?php

namespace App\DataTables\Edaphologies;

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
            $this->setColumnWithRelationship(trans_title('crops'), 'crop.crop_name'),
            $this->setColumn(trans('base.type'), 'edaphology_level'),
            $this->setColumn(sections('edaphologies.sample.name'), 'edaphology_name', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('base.reference'), 'edaphology_reference', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('geolocations.lat'), 'edaphology_lat', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('geolocations.lng'), 'edaphology_lng', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(trans('base.description'), 'edaphology_observations', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('edaphologies.sample.ph'), 'edaphology_ph', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('edaphologies.sample.aggregate:min'), 'edaphology_aggregate_stability', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('edaphologies.sample.carbonate:min'), 'edaphology_calcium_carbonate_equivalent', [
                'defaultContent' => no_result(),
            ]),
            $this->setColumn(sections('edaphologies.sample.lime:min'), 'edaphology_active_lime', [
                'defaultContent' => no_result(),
            ]),
            // $this->setColumn(trans('persona.role'), 'role', [
            //      'orderable' => false,
            //      'searchable' => false,
            //      'defaultContent' => no_result(),
            // ]),
            // $this->setColumnWithRelationship(trans('financials.client'), 'client.client_name'),
            // $this->setColumnWithRelationship(__('Twitter'), 'profile.profile_social_twitter'),
            // [
            //     'title' => __('Facebook'),
            //     'name' => 'profile.profile_social_facebook',
            //     'data' => 'profile.profile_social_facebook',
            // ],
        ];
    }

    /**
     * Show / hide columns by group.
     * @return array
     */
    protected function setColumnsGroups() : array
    {
        //Columns groups
        $type     = [2];//Sample type
        $group[1] = [1, 3, 4, 5, 6, 7];
        $group[2] = [8, 9, 10, 11];
        $group[3] = [last($group[2]) + 1];//Action
        //Results
        return [
            $this->createColumnsGroupsAll(),
            $this->createColumnsGroups(icon('plots', trans('tables.button:plot')), [
                'show' => array_merge($type, $group[1], $group[3]),
                'hide' => $group[2],
            ]),
            $this->createColumnsGroups(icon('file', trans('tables.button:data')), [
                'show' => array_merge($type, $group[2], $group[3]),
                'hide' => $group[1],
            ]),
        ];
    }
}