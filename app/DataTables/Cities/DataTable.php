<?php

namespace App\DataTables\Cities;

use App\DataTables\Cities\DataTableColumns;
use App\DataTables\Cities\DataTableJavascript;
use App\DataTables\Cities\DataTableSearch;
use App\Repositories\Cities\CitiesRepository;
use App\Repositories\Cities\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action;
    protected $section = 'cities';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(CitiesRepository::class)
            ->dataTable()
            ->select($this->section . '.*')
            ->with([
                'country',
                'state',
                'region'
            ]);

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
            ->editColumn('country.country_name', function($date){
                return sprintf('%s (%s)', $date->country->country_name, $date->country_id);
            })
            ->editColumn('state.state_name', function($date){
                return sprintf('%s (%s)', $date->state->state_name, $date->state_id);
            })
            ->editColumn('region.region_name', function($date){
                return sprintf('%s (%s)', $date->region->region_name, $date->region_id);
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
