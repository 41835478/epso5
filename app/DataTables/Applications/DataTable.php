<?php

namespace App\DataTables\Applications;

use App\DataTables\Applications\DataTableColumns;
use App\DataTables\Applications\DataTableJavascript;
use App\DataTables\Applications\DataTableSearch;
use App\Repositories\Applications\ApplicationsRepository;
use App\Repositories\Applications\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'applications';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(ApplicationsRepository::class)
            ->dataTable()
            // //Only God and Admin see trashed material...
            // ->when(Credentials::isAdmin(), function($query) {
            //     return $query->withTrashed();
            // })
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
            // ->setRowClass(function ($data) {
            //     return ($data->trashed() ? 'trashed' : ' ');
            // })
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
