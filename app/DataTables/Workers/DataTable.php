<?php

namespace App\DataTables\Workers;

use App\DataTables\Workers\DataTableColumns;
use App\DataTables\Workers\DataTableJavascript;
use App\DataTables\Workers\DataTableSearch;
use App\Repositories\Workers\WorkersRepository;
use App\Repositories\Workers\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'workers';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(WorkersRepository::class)
            ->dataTable($columns = ['*'], $table = 'workers')
            ->select($this->section . '.*')
            ->when(Credentials::isAdmin(), function($query) {
                return $query->withTrashed();
            })
            ->with('client', 'user');

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
            ->rawColumns(['action', 'checkbox', 'client.client_name', 'user.name', 'worker_observations'])
            ->setRowClass(function ($data) {
                return ($data->trashed() ? 'trashed' : ' ');
            })
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            })
            ->editColumn('worker_observations', function($data) {
                return $this->type('break')->textLength(50)->formatString($data->worker_observations);
            })
            ->editColumn('client.client_name', function($data) {
                return $this->type('break')->textLength(25)->formatString($data->client->client_name);
            })
            ->editColumn('user.name', function($data) {
                return $this->type('break')->textLength(25)->formatString($data->user->name);
            })
            ->editColumn('worker_ropo_level', function($data) {
                return sections('workers.ropo:level')[$data->worker_ropo_level] ?? no_result();
            });
    }
}
