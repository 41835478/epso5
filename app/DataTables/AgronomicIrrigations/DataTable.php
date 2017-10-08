<?php

namespace App\DataTables\AgronomicIrrigations;

use App\DataTables\AgronomicIrrigations\DataTableColumns;
use App\DataTables\AgronomicIrrigations\DataTableJavascript;
use App\DataTables\AgronomicIrrigations\DataTableSearch;
use App\Repositories\AgronomicIrrigations\AgronomicIrrigationsRepository;
use App\Repositories\AgronomicIrrigations\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'agronomic_irrigations';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(AgronomicIrrigationsRepository::class)
            ->dataTable($columns = ['*'], $table = $this->section)
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
            ->editColumn('agronomic_quantity', function($data) {
                return sprintf('%s %s', $data->agronomic_quantity, select_units($this->section)[$data->agronomic_quantity_unit]);
            })
            ->editColumn('agronomic_observations', function($data) {
                return $this->textLength(50)->formatString($data->agronomic_observations ?? null);
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
