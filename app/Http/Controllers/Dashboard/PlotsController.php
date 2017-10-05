<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Plots\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\PlotsCreateRequest;
use App\Http\Requests\PlotsUpdateRequest;
use App\Repositories\Plots\PlotsRepository;
use App\Repositories\Users\UsersRepository;
use Credentials;

class PlotsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;
    protected $user;
    /**
     * @var private
     */
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'user';
    private $section    = 'plots';

    public function __construct(DataTable $table, PlotsRepository $controller, UsersRepository $user)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        $this->user         = $user;
        //Sharing in the view
        view()->share([
            'legend'    => $this->section,
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
        return view(dashboard_path($this->section . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlotsCreateRequest $request)
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
        $data   = $this->controller->find($id);
        //Check if the user own the database record
        //and if the role is authorizate
        if(!Credentials::authorize($data)) {
            return Credentials::accessError();
        }
        //Set variables
        $users = $this->user->listOfUsersByRole($client = $data->client_id);
        list($cropTypes, $cropPatterns, $cropVarieties, $cropTrainig) = $this->controller->getCrop($data);
            //Return the data
            return view(dashboard_path($this->section . '.edit'), compact('cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'data', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlotsUpdateRequest $request, $id)
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