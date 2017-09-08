<?php

namespace App\DataTables\Irrigations;

use App\DataTables\Irrigations\DataTableColumns;
use App\DataTables\Irrigations\DataTableJavascript;
use App\DataTables\Irrigations\DataTableSearch;
use App\Repositories\Irrigations\IrrigationsRepository;
use App\Repositories\Irrigations\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'irrigations';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(IrrigationsRepository::class)
            ->dataTable()
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
