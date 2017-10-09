<?php

namespace App\DataTables\Plots;

use App\DataTables\Plots\DataTableColumns;
use App\DataTables\Plots\DataTableJavascript;
use App\DataTables\Plots\DataTableSearch;
use App\Repositories\Plots\PlotsRepository;
use App\Repositories\Plots\UsersRepository;
use App\Services\DataTables\DataTablesRepository as Repository;
use Credentials;

class DataTable extends Repository
{
    use DataTableColumns, DataTableJavascript, DataTableSearch;

    /**
     * @var string
     */
    protected $action  = 'plots'; //Cusmomize action
    protected $section = 'plots';

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        //Show only row with the user_id field empty
        $no_users = $this->getValue('no_users') ? true : false;

        $query = app(PlotsRepository::class)
            ->dataTable($columns = ['*'], $table = 'plots', $userNull = $no_users)
            //Only God and Admin see trashed material...
            ->when(Credentials::isAdmin(), function($query) {
                return $query->withTrashed();
            })
            ->select($this->section . '.*')
            ->with(SELF::relationships());

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
            ->rawColumns(['action', 'city.city_name', 'checkbox', 'crop_variety.crop_variety_name', 'plot_name', 'user.name'])
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
            ->editColumn('user.name', function($data) {
                return $this
                    ->formatString($data->user->name ?? null, $data->user ?? null);
            })
            ->editColumn('crop_variety.crop_variety_name', function($data) {
                return $this
                    ->formatString($data->crop_variety->crop_variety_name ?? null, $data->crop_variety ?? null);
            })
            ->editColumn('region.region_name', function($data) {
                return $this
                    ->formatString($data->region->region_name ?? null, $data->region ?? null);
            })
            ->editColumn('city.city_name', function($data) {
                return $this
                    ->formatString($data->city->city_name ?? null, $data->city ?? null);
            })
            ->editColumn('plot_name', function($data) {
                return $this
                    ->formatString($data->plot_name ?? null);
            })
            ->editColumn('geolocation.geo_height', function($data) {
                return isset($data->geolocation->geo_height) 
                    ? sprintf('%s m', ceil($data->geolocation->geo_height)) 
                    : no_result();
            });
    }

    /**
     * Set relationships by role
     * @return object
     */
    public function relationships($with = null)
    {
        //Filtering the relationships
        if(Credentials::isAdmin()) {
            return $this->getValue('no_users') 
            ? ['city', 'client', 'crop', 'crop_variety', 'geolocation', 'region']//Remove the user relationship when search for plot without users...
            : ['city', 'client', 'crop', 'crop_variety', 'geolocation', 'region', 'user'];
        } 
        return ['city', 'crop', 'crop_variety', 'geolocation', 'region', 'user'];
    }
}
