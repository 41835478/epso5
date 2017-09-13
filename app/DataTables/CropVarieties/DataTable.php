<?php

namespace App\DataTables\CropVarieties;

use App\DataTables\CropVarieties\DataTableColumns;
use App\DataTables\CropVarieties\DataTableJavascript;
use App\DataTables\CropVarieties\DataTableSearch;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use App\Repositories\CropVarieties\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Route;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = 'crop_children';
    protected $section = 'crop_varieties';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = app(CropVarietiesRepository::class)
            ->dataTable()
            ->where('crop_varieties.crop_id', Route::input('crop_variety'))
            ->select($this->section . '.*')
            ->with(['crop', 'crop_variety_type']);

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
                return view($this->getAction($this->action), compact('data'))
                    ->render();
            })
            ->editColumn('checkbox', function($data) {
                return $this->setCheckbox($data->id);
            });
    }
}
