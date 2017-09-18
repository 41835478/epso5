<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\ClimaticStations\DataTable;
use App\Http\Controllers\DashboardController;
use App\Repositories\ClimaticStations\ClimaticStationsRepository;
use App\Http\Requests\ClimaticStationsRequest;
//use Credentials;
//use Illuminate\Http\Request;

class ClimaticStationsActivesController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;
    /**
     * @var private
     */
    private $breadcrumb;
    private $legend;    //Just in case we need to customize the lengend. Just use the legend file name.
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'admin';
    private $section    = 'climatic_stations';

    public function __construct(ClimaticStationsRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'breadcrumb'    => sections('climatic_stations.active'),
            'section'       => $this->section,
            'role'          => $this->role
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return $this->table
            //Customize the variable for datatable
            ->setValue([
                'filter' => 'actives'//Show only the active stations assign to a plot
            ])
            ->render(dashboard_path($this->section . '.index'));
    }
}