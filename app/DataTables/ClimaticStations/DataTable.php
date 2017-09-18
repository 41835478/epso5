<?php

namespace App\DataTables\ClimaticStations;

use App\DataTables\ClimaticStations\DataTableColumns;
use App\DataTables\ClimaticStations\DataTableJavascript;
use App\DataTables\ClimaticStations\DataTableSearch;
use App\Repositories\ClimaticStations\ClimaticStationsRepository;
use App\Repositories\ClimaticStations\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'climatic_stations';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(ClimaticStationsRepository::class)
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
