<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Edaphologies\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\EdaphologiesRequest;
use App\Repositories\Edaphologies\EdaphologiesRepository;
use App\Repositories\Plots\PlotsRepository;
use Credentials;
//use Illuminate\Http\Request;

class EdaphologiesController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $plots;
    protected $table;
    /**
     * @var private
     */
    private $legend     = 'edaphologies';
    private $parent     = 'plots';
    private $role       = 'admin';
    private $section    = 'edaphologies';

    public function __construct(EdaphologiesRepository $controller, DataTable $table, PlotsRepository $plots)
    {
        $this->controller   = $controller;
        $this->plots        = $plots;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'legend'    => $this->legend,
            'parent'    => $this->parent,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Plot data
        $plot = $this->plots->find($id);
        //Filter by user throw plot table 
        //because edaphology has no user_id 
        //because is no mandatory to add user to plot...  
        //If plot has no user... edaphology has no sense to have one, so the table has not user_id field.   
        if(!Credentials::authorize($plot)) {
            return Credentials::accessError();
        }
            //Get coordenates from all the samples
            $coordenates = $this->controller->coordenates($id);
            //Get the table
            return $this->table
                //Customize the action for datatables [dashboard/_components/actions]
                ->setValue($plot)
                ->render(dashboard_path($this->section . '.index'), compact('coordenates', 'plot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plot = $this->plots->find($id);
            return view(dashboard_path($this->section . '.create'), compact('plot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EdaphologiesRequest $request)
    {
        $create = $this->controller->store();
            return $create 
                ? redirect()
                    ->route('dashboard.user.' . $this->section . '.show', request('plot_id'))
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
    public function update(EdaphologiesRequest $request, $id)
    {
        $update = $this->controller->store($id);
            return $update 
                ? redirect()
                    ->route('dashboard.user.' . $this->section . '.show', $id)
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