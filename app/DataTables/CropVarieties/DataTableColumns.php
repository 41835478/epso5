<?php

namespace App\DataTables\CropVarieties;

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
            $this->setColumnWithRelationship(trans_title('crops', 'singular'), 'crop.crop_name', [
                'orderable' => false,
            ]),
            $this->setColumn(trans_title('crop_varieties'), 'crop_variety_name'),
            $this->setColumnWithRelationship(sections('crop_varieties.type'), 'crop_variety_type.crop_variety_type_name', [
                'defaultContent' => no_result(),
            ]),
        ];
    }
}