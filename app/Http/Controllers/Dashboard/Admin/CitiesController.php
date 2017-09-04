<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\Cities\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\CitiesRequest;
use App\Repositories\Cities\CitiesRepository;
use App\Repositories\Countries\CountriesRepository;
use App\Repositories\States\StatesRepository;

class CitiesController extends DashboardController
{
    /**
     * @var string
     */
    protected $controller;
    protected $role;
    protected $table;

    public function __construct(CitiesRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        $this->role         = 'admin';
        
        //Sharing in the view
        view()->share([
            'section'   => 'cities',
            'role'      => 'admin'
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
            ->render(dashboard_path('cities.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CountriesRepository $country, StatesRepository $state)
    {
        $countries  = $country->lists(['id', 'country_name']);
        $states     = $state->lists(['id', 'state_name'], $firstEmptyField = true);
        //
        return view(dashboard_path('cities.create'), compact('countries', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitiesRequest $request)
    {
        $create = $this->controller
            ->store();

            return $create 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.cities.index')
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
    public function edit($id, CountriesRepository $country)
    {
        return view(dashboard_path('cities.edit'))
            ->withData($this->controller->find($id))
            ->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitiesRequest $request, $id)
    {
        $update = $this->controller
            ->store($id);

            return $update 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.cities.index')
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