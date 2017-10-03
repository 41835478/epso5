<?php

namespace App\DataTables\Users;

use App\DataTables\Users\DataTableColumns;
use App\DataTables\Users\DataTableJavascript;
use App\DataTables\Users\DataTableSearch;
use App\Repositories\Users\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action;
    protected $section = 'users';

    /**
     * Get the query object to be processed by dataTables.
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = app(UsersRepository::class)
            ->dataTable()
            //Only God and Admin see trashed material...
            ->when(Credentials::isAdmin(), function($query) {
                return $query->withTrashed();
            })
            ->select($this->section . '.*')
            ->with('profile', 'client');

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
            ->editColumn('role', function($data) {
                return trans('selects.roles')[Credentials::userRole($data)] ?? no_result();
            });
    }
}
