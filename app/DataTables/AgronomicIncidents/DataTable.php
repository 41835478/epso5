<?php

namespace App\DataTables\AgronomicIncidents;

use App\DataTables\AgronomicIncidents\DataTableColumns;
use App\DataTables\AgronomicIncidents\DataTableJavascript;
use App\DataTables\AgronomicIncidents\DataTableSearch;
use App\Repositories\AgronomicIncidents\AgronomicIncidentsRepository;
use App\Repositories\AgronomicIncidents\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'agronomic_incidents';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(AgronomicIncidentsRepository::class)
            ->dataTable()
            //Only God and Admin see trashed material...
            ->when(Credentials::isAdmin(), function($query) {
                return $query->withTrashed();
            })
            ->select($this->section . '.*')
            ->with(self::relationships());

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
            ->rawColumns(['action', 'checkbox', 'agronomic_observations'])
            ->setRowClass(function ($data) {
                return ($data->trashed() ? 'trashed' : ' ');
            })
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('agronomic_observations', function($data) {
                return $this->textLength(50)->formatString($data->agronomic_observations ?? null);
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
