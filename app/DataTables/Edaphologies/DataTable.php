<?php

namespace App\DataTables\Edaphologies;

use App\DataTables\Edaphologies\DataTableColumns;
use App\DataTables\Edaphologies\DataTableJavascript;
use App\DataTables\Edaphologies\DataTableSearch;
use App\Repositories\Edaphologies\EdaphologiesRepository;
use App\Repositories\Edaphologies\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action   = true; //Cusmomize action
    protected $section  = 'edaphologies';
    protected $decimals = 1;

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $plot = $this->getValue();

        $query = app(EdaphologiesRepository::class)
            ->dataTable($columns = ['*'], $table = 'edaphologies', $userNull = false, $plot)
            ->select($this->section . '.*')
            ->with('crop')
            ->orderBy('edaphology_level', 'ASC');

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
            ->rawColumns(['action', 'checkbox', 'edaphology_observations', 'edaphology_name', 'edaphology_texture', 'edaphology_reference'])
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('edaphology_level', function($data) {
                return sections('edaphologies.sample.type.' . $data->edaphology_level);
            })
            ->editColumn('edaphology_name', function($data) {
                return $this
                    ->type('reduce')
                    ->textLength(10)
                    ->formatString($data->edaphology_name ?? null);
            })
            ->editColumn('edaphology_reference', function($data) {
                return $this->formatString($data->edaphology_reference ?? null);
            })
            ->editColumn('edaphology_observations', function($data) {
                return $this->formatString($data->edaphology_observations ?? null);
            })
            ->editColumn('edaphology_texture', function($data) {
                return $this->formatString($data->edaphology_texture ?? null);
            })
            ->editColumn('edaphology_ph', function ($data) {
                return number_format($data->edaphology_ph, $this->decimals);
            })
            ->editColumn('edaphology_aggregate_stability', function ($data) {
                return number_format($data->edaphology_aggregate_stability, $this->decimals) . '%';
            })
            ->editColumn('edaphology_calcium_carbonate_equivalent', function ($data) {
                return number_format($data->edaphology_calcium_carbonate_equivalent, $this->decimals) . '%';
            })
            ->editColumn('edaphology_active_lime', function ($data) {
                return number_format($data->edaphology_active_lime, $this->decimals) . '%';
            })
            ->editColumn('edaphology_cation_exchange', function ($data) {
                return number_format($data->edaphology_cation_exchange, $this->decimals);
            })
            ->editColumn('edaphology_coarse_elements', function ($data) {
                return number_format($data->edaphology_coarse_elements, $this->decimals) . '%';
            })
            ->editColumn('edaphology_sand', function ($data) {
                return number_format($data->edaphology_sand, $this->decimals) . '%';
            })
            ->editColumn('edaphology_silt', function ($data) {
                return number_format($data->edaphology_silt, $this->decimals) . '%';
            })
            ->editColumn('edaphology_clay', function ($data) {
                return number_format($data->edaphology_clay, $this->decimals) . '%';
            })
            ->editColumn('edaphology_total_organic_matter', function ($data) {
                return number_format($data->edaphology_total_organic_matter, $this->decimals) . '%';
            })
            ->editColumn('edaphology_organic_carbon', function ($data) {
                return number_format($data->edaphology_organic_carbon, $this->decimals) . '%';
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
