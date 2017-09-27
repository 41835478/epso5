<?php 

namespace App\Services\DataTables;

use App\Services\DataTables\DataTablesBuilder;

abstract class DataTablesRepository extends DataTablesBuilder {

    /**
     * @var array
     */
    protected $filters = [
        'change',
        'date',
        'input', 
        'number',
        'select', 
    ];

    /**
     * Configuration values: To be defined in destination
     */
    protected $action;
    protected $deleteTitle;
    protected $section;

    /*
    |--------------------------------------------------------------------------
    | HTML constructor methods
    |--------------------------------------------------------------------------
    */

    /**
     * Display ajax response.
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable()
    {
        $data = $this->query();

        return $this->datatables
            ->eloquent($data)
            ->rawColumns(['action', 'checkbox'])
            ->addColumn('action', function ($data) {
                return view($this->action, compact('data'))
                    ->render();
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox();
            });;
    }

    /**
     * Generate the html for the table
     * In this case we are injecting new fields into the getColumns() using optionsForAdmins() in trait HelpersForAgronomics
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->setColumns())
            ->addAction(['title' => ''])
            ->parameters($this->getBuilderParameters())
            ->ajax('');
    }

    /**
     * Return the configuration parameters for the datatables javascript
     * @return array
     */
    protected function getBuilderParameters() : array
    {
        return [
            'dom' => $this->setBottons(),
            'buttons' => [
                [
                    'extend' => 'selectAll',
                    'text' => icon('check'),
                    'container' => '#selector',
                ],
                [
                    'extend' => 'selectNone',
                    'text' => icon('uncheck'),
                    'container' => '#selector',
                ],
                [
                    'extend' => 'print',
                    'text' => icon('print'),
                ],
                // [
                //     'extend' => 'print',
                //     'text' => icon('hashtag'),
                //     'exportOptions' => [
                //         'modifier' => [
                //             'selected' => true,
                //         ],
                //     ],
                // ],
                'reset',
                $this->setColumnsGroups(),
            ],
            'columnDefs' => [
                'orderable' => false,
                'targets' => 0,
                'className' => 'select-checkbox',
            ],
            'select' => [
                'style' => 'multi',
                'blurable' => false,
                'info' => false,
            ],
            'language'          => ['url' => $this->getLanguageFile()],
            'processing'        => true,
            'serverSide'        => true,
            'responsive'        => true,
            'stateSave'         => true,
            'deferRender'       => true,
            'stateDuration'     => 'dataTableCache',
            'aLengthMenu'       => [5, 10, 25, 50, 75, 100, 200, 300, 400, 500, 1000, 3000, 5000, 10000, 50000],
            'iDisplayLength'    => 10,
            'initComplete'      => $this->initComplete(),
            'drawCallback'      => $this->jqueryCallback(),
            'stateLoadParams'   => $this->stateLoadParams(),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return time();
    }

    /**
     * Create the search attributes
     * @return array
     */
    protected function searchAttributes() : array
    {
        return [
            // [
            //     'type'      => 'input',
            //     'container' => 'search_name',
            //     'column'    => 3
            // ],
        ];
    }

    /**
     * Show / hide columns by group.
     * @return array
     */
    protected function setColumnsGroups() : array
    {
        return [
            // [
            //     'extend' => 'colvisGroup',
            //     'container' => '#colvis',
            //     'text' => __('Personal info'),
            //     'show' => [0, 2, 3, 4],
            //     'hide' => [1, 5],
            // ],
        ];
    }
}