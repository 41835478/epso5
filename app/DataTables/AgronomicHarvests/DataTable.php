<?php

namespace App\DataTables\AgronomicHarvests;

use App\DataTables\AgronomicHarvests\DataTableColumns;
use App\DataTables\AgronomicHarvests\DataTableJavascript;
use App\DataTables\AgronomicHarvests\DataTableSearch;
use App\Repositories\AgronomicHarvests\AgronomicHarvestsRepository;
use App\Repositories\AgronomicHarvests\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $section = 'agronomic_harvests';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(AgronomicHarvestsRepository::class)
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
            ->editColumn('client.client_name', function($data) {
                return sprintf('%s (%s)', $data->client->client_name ?? no_results(), $data->crop->crop_name ?? no_results());
            })
            ->editColumn('agronomic_quantity', function($data) {
                return sprintf('%s %s', $data->agronomic_quantity, select_units($this->section)[$data->agronomic_quantity_unit]);
            })
            ->editColumn('agronomic_quantity_ha', function($data) {
                return sprintf('%s %s', $data->agronomic_quantity_ha, select_units($this->section)[$data->agronomic_quantity_unit] . '/ha');
            })
            ->editColumn('agronomic_observations', function($data) {
                return $this->textLength(50)->formatString($data->agronomic_observations ?? null);
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            })
            ->filterColumn($this->section . '.agronomic_date', function($query, $keyword) {
                $this->filterByDate($query, $keyword);
            });
    }
}
