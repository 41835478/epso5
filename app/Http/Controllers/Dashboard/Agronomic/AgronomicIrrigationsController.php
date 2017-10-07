<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicIrrigations\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\AgronomicIrrigationsRequest;
use App\Repositories\AgronomicIrrigations\AgronomicIrrigationsRepository;
use App\Repositories\Plots\PlotsRepository;
use Credentials;
//use Illuminate\Http\Request;

class AgronomicIrrigationsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $plot;
    protected $table;
    /**
     * @var private
     */
    private $legend;    //Just in case we need to customize the lengend. Just use the legend file name.
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'user';
    private $section    = 'agronomic_irrigations';

    public function __construct(AgronomicIrrigationsRepository $controller, DataTable $table, PlotsRepository $plot)
    {
        $this->controller   = $controller;
        $this->plot         = $plot;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->table
            ->render(dashboard_path($this->section . '.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get the users and the clients
        list($clients, $users) = $this->controller->getClientUser();
        $plots = Credentials::isOnlyRole('user') ? $this->plot->listsByRole() : null;
            //Get the value
            return view(dashboard_path($this->section . '.create'), compact('clients', 'plots', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgronomicIrrigationsRequest $request)
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
        //Set default data
        $data = $this->controller->find($id);
        //Check if the user own the database record
        //and if the role is authorizate
        if(!Credentials::authorize($data)) {
            return Credentials::accessError();
        }
        //List of plots
        $plots = $this->plot->listsByUser($data->user_id) ?? null;
            //Return the values
            return view(dashboard_path($this->section . '.edit'), compact('data', 'plots'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgronomicIrrigationsRequest $request, $id)
    {
        $update = $this->controller->store($id);
            return $update 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.' . $this->section . '.index')
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