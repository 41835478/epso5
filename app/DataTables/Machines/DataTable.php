<?php

namespace App\DataTables\Machines;

use App\DataTables\Machines\DataTableColumns;
use App\DataTables\Machines\DataTableJavascript;
use App\DataTables\Machines\DataTableSearch;
use App\Repositories\Machines\MachinesRepository;
use App\Repositories\Machines\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Carbon\Carbon;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $alert   = 30; //Days before alert date expired
    protected $section = 'machines';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(MachinesRepository::class)
            ->dataTable($columns = ['*'], $table = $this->section)
            //Only God and Admin see trashed material...
            ->when(Credentials::isAdmin(), function($query) {
                return $query->withTrashed();
            })
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
            ->rawColumns(['action', 'checkbox', 'machine_brand', 'machine_equipment_name', 'machine_model', 'machine_observations'])
            ->setRowClass(function ($data) {
                return $data->trashed() ? 'trashed' : ' ';
            })
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('machine_equipment_name', function($data) {
                $field = $data->equipment->equipment_name ?? $data->machine_equipment_name;
                    return $this->textLength(25)->formatString($field ?? null);
            })
            ->editColumn('machine_brand', function($data) {
                return $this->textLength(25)->formatString($data->machine_brand ?? null);
            })
            ->editColumn('machine_model', function($data) {
                return $this->textLength(25)->formatString($data->machine_model ?? null);
            })
            ->editColumn('machine_next_inspection', function($data) {
                return next_inspection($data->machine_inspection ?? null, $data->machine_next_inspection ?? null, $format = 'date');
            })
            ->editColumn('machine_observations', function($data) {
                return $this->textLength(50)->formatString($data->machine_observations ?? null);
            })
            ->editColumn('machine_inspection_day', function($data) {
                $days = next_inspection($data->machine_inspection ?? null, $data->machine_next_inspection ?? null, $format = 'days');
                    return $days 
                        ? $days . ' ' . strtolower(trans('dates.day:plural'))
                        : null;
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
