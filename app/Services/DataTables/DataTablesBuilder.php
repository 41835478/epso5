<?php 

namespace App\Services\DataTables;

use App\Services\DataTables\DataTableHelpers;
use App\Services\DataTables\Javascript\InitComplete;
use App\Services\DataTables\Javascript\JqueryCallback;
use App\Services\DataTables\Javascript\StateLoadParams;
use App\Services\DataTables\Search\Filters;
use App\Services\DataTables\Search\SearchEngine;
use Yajra\Datatables\Services\DataTable;

abstract class DataTablesBuilder extends DataTable {
    
    use InitComplete, Filters, JqueryCallback, SearchEngine, StateLoadParams, DataTableHelpers;

    /*
    |--------------------------------------------------------------------------
    | Setter and Getters
    |--------------------------------------------------------------------------
    */

    /**
     * Return the table bottons
     * @return string
     */
    protected function setBottons() : string
    {
        return '<"datatables_button_container"<"#selector.app-button-group">B<"#colvis.app-button-group">><"small-devices-collapse datatables_length_container"l>rtip';
    }

    /**
     * Return the table language file
     * @return string
     */
    protected function getLanguageFile() : string
    {
        return '../../../../../vendor/datatables/datatables-es.json';
    }

    /**
     * Set the columns value for a non relationship column
     * @param  string $title
     * @param  string $name
     * @param  array $attributes [Add extra attributes]
     * @return array
     */
    protected function setColumn($title, $name, $attributes = []) : array
    {
        $column = [
                'title' => $title, 
                'name' => $this->section . '.' . $name, 
                'data' => $name, 
            ];

        return $attributes
            ? array_merge($column, $attributes)
            : $column;
    }

    /**
     * Set the columns value for a relationship column
     * @param  string $text
     * @param  string $name
     * @param  array $attributes [Add extra attributes]
     * @return array
     */
    protected function setColumnWithRelationship($title, $relationship) : array
    {
        return [
                'title' => $title, 
                'name' => $relationship, 
                'data' => $relationship, 
            ];
    }

    /**
     * Set the columns value for a search field
     * @param  string $type         [Allowed filter]
     * @param  string $container    [Input id]
     * @param  array $column        [Column number to search]
     * @param  string $searchType   [Can be 'regular' or 'exact'] [Regular by default]
     * @return array
     */
    protected function setColumnSearch($type, $container, $column, $searchType = 'regular') : array
    {
        return [
            'type' => $type, 
            'container' => $container, 
            'column' => $column, 
            'searchType' => $searchType, 
        ];
    }

    /**
     * Create the checkbox title
     * App\DataTables\Users\DataTableColumns
     * @return array
     */
    protected function createCheckbox() : array
    {
        return  [
            'title' => '', 
            'name' => 'checkbox', 
            'data' => 'checkbox', 
            'searchable' => false, 
            'orderable' => false, 
            'render' => null, 
            'print' => false, 
            'width' => 10
        ];
    }

    /**
     * Update the checkbox in every section in the dataTable() method
     * 
     * @return array
     */
    protected function setCheckbox($id) : string
    {
        return sprintf('<input name="item[]" id="checkbox" type="checkbox" class="checkboxItem" value="%s">', $id);
    }

    /**
     * Helper to create a colvis button
     * Will be add to attributes array
     * @return array
     */
    protected function createColumnsGroups($title, $attributes = []) : array
    {
        $group = [
            'extend' => 'colvisGroup',
            'container' => '#colvis',
            'text' => $title
        ];

        return array_merge($group, $attributes);
    }

    /**
     * Helper to create a specific colvis button: show all columns
     * Will be add to attributes array
     * @return array
     */
    protected function createColumnsGroupsAll() : array
    {
        return [
            'extend' => 'colvisGroup',
            'text' => icon('bars', trans('tables.button:all')),
            'container' => '#colvis',
            'show' => ':hidden',
        ];
    }
}