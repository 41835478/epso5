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
    protected $action  = false; //Cusmomize action
    protected $section = 'edaphologies';

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
            ->rawColumns(['action', 'checkbox', 'edaphology_observations'])
            ->addColumn('action', function ($data) {
                return view($this->getAction(), compact('data'))
                    ->render();
            })
            ->editColumn('edaphology_level', function($data) {
                return sections('edaphologies.sample.type.' . $data->edaphology_level);
            })
            ->editColumn('edaphology_observations', function($data) {
                return $this->textLength(30)
                    ->formatString($data->edaphology_observations ?? null);
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
