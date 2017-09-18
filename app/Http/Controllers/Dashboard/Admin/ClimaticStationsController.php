<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\ClimaticStations\DataTable;
use App\Http\Controllers\DashboardController;
use App\Repositories\ClimaticStations\ClimaticStationsRepository;
use App\Http\Requests\ClimaticStationsRequest;
//use Credentials;
//use Illuminate\Http\Request;

class ClimaticStationsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;
    /**
     * @var private
     */
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
            //'legend'   => $this->legend,
            //'parent'   => $this->parent,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
        //Middleware
        //$this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->table
            //Customize the action for datatables [dashboard/_components/actions]
            // ->setValue([
            //     'action' => 'climatic_stations:action'
            // ])
            ->render(dashboard_path($this->section . '.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(dashboard_path($this->section . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClimaticStationsRequest $request)
    {
        $create = $this->controller->store();
            return $create 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.' . $this->section . '.index')
                    ->withStatus(__('The item has been create successfuly'))
                : redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([
                    __('An error occurred during the creating process'), 
                    __('If the error persist, please contact with the system administrator')
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(dashboard_path($this->section . '.edit'))
            ->withData($this->controller->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClimaticStationsRequest $request, $id)
    {
        //Because we are using the same update controller for: 'dashboard.admin.climatic_stations.active' and for 'dashboard.admin.climatic_stations.index'
        //We want a different redirection base on the previus route
        $route = request('previus_route') ?? 'dashboard.' . $this->role . '.' . $this->section . '.index';
        //Then update
        $update = $this->controller->store($id);
            return $update 
                ? redirect()
                    ->route($route)
                    ->withStatus(__('The items has been updated successfuly'))
                : redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([
                    __('An error occurred during the updating process'), 
                    __('If the error persist, please contact with the system administrator')
                ]);
    }
}