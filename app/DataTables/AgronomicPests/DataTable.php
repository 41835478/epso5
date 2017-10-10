<?php

namespace App\DataTables\AgronomicPests;

use App\DataTables\AgronomicPests\DataTableColumns;
use App\DataTables\AgronomicPests\DataTableJavascript;
use App\DataTables\AgronomicPests\DataTableSearch;
use App\Repositories\AgronomicPests\AgronomicPestsRepository;
use App\Repositories\AgronomicPests\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = false; //Cusmomize action
    protected $section = 'agronomic_pests';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(AgronomicPestsRepository::class)
            ->dataTable($columns = ['*'], $table = $this->section)
            //Only God and Admin see trashed material...
            ->when(Credentials::isAdmin(), function($query) {
                return $query->withTrashed();
            })
            ->select($this->section . '.*')
            ->with(self::relationships(['pest']));

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
