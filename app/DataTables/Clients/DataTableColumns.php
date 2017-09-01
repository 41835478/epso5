<?php

namespace App\DataTables\Clients;

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
            $this->setColumn(trans('financials.client'), 'client_name'),
            $this->setColumn(trans('persona.address'), 'client_address'),
            $this->setColumn(trans('persona.id.nif'), 'client_nif'),
            $this->setColumn(trans('persona.state'), 'client_state'),
            $this->setColumn(trans('persona.city'), 'client_city'),
            $this->setColumn(trans('persona.zip'), 'client_zip'),
            $this->setColumn(trans('persona.telephone'), 'client_telephone'),
            $this->setColumn(trans('persona.contact'), 'client_contact'),
            $this->setColumn(trans('persona.email'), 'client_email'),
            $this->setColumn(trans('persona.website'), 'client_web'),
            $this->setColumn(trans('persona.image'), 'client_image'),
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