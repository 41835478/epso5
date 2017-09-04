<?php

namespace App\DataTables\Users;

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
            $this->setColumn(trans('persona.role'), 'role', [
                 'orderable' => false,
                 'searchable' => false,
            ]),
            $this->setColumnWithRelationship(trans_title('clients', 'singular'), 'client.client_name'),
            $this->setColumn(trans('persona.name'), 'name'),
            $this->setColumn(trans('persona.email'), 'email'),
            $this->setColumn(trans('persona.locale'), 'locale'),
            $this->setColumnWithRelationship(trans('persona.website'), 'profile.profile_url'),
            $this->setColumnWithRelationship(__('Twitter'), 'profile.profile_social_twitter'),
            [
                'title' => __('Facebook'),
                'name' => 'profile.profile_social_facebook',
                'data' => 'profile.profile_social_facebook',
            ],
        ];
    }

    /**
     * Show / hide columns by group.
     * @return array
     */
    protected function setColumnsGroups() : array
    {
        return [
            $this->createColumnsGroupsAll(),
            $this->createColumnsGroups(icon('user', trans('tables.button:personal')), [
                'show' => [0, 2, 3, 4, 5, 6],
                'hide' => [1, 7, 8, 9],
            ]),
            $this->createColumnsGroups(icon('social', trans('tables.button:social')), [
                'show' => [0, 7, 8, 9],
                'hide' => [1, 2, 3, 4, 5, 6],
            ]),
        ];
    }
}