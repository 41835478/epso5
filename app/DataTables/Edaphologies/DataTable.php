<?php

namespace App\DataTables\Edaphologies;

use App\DataTables\Edaphologies\DataTableColumns;
use App\DataTables\Edaphologies\DataTableJavascript;
use App\DataTables\Edaphologies\DataTableSearch;
use App\Repositories\Edaphologies\EdaphologiesRepository;
use App\Repositories\Edaphologies\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'edaphologies';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $filter = $this->getValue('id');

        $query = app(EdaphologiesRepository::class)
            ->dataTable($columns = ['*'], $table = 'edaphologies', $userNull = false, $filter)
            ->select($this->section . '.*');

        return $this->applyScopes($query);
    }

    /**
     * Build DataTable class.
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->rawColumns(['action', 'checkbox'])
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
