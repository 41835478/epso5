<?php

namespace App\DataTables\Plots;

use App\DataTables\Plots\DataTableColumns;
use App\DataTables\Plots\DataTableJavascript;
use App\DataTables\Plots\DataTableSearch;
use App\Repositories\Plots\PlotsRepository;
use App\Repositories\Plots\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'plots';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(PlotsRepository::class)
            ->dataTable()
            ->select($this->section . '.*')
            ->with([
                'city', 
                'client', 
                'crop', 
                'crop_variety', 
                'geolocation', 
                'region', 
                'user'
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
            ->rawColumns(['action', 'checkbox', 'plot_name', 'user.name'])
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('user.name', function($data) {
                return $this
                    ->formatString($data->user->name ?? null, $data->user ?? null);
            })
            ->editColumn('plot_name', function($data) {
                return $this
                    ->formatString($data->plot_name ?? null);
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
