<?php

namespace App\DataTables\Clients;

use App\DataTables\Clients\DataTableColumns;
use App\DataTables\Clients\DataTableJavascript;
use App\DataTables\Clients\DataTableSearch;
use App\Repositories\Clients\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $section = 'clients';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(ClientsRepository::class)
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
