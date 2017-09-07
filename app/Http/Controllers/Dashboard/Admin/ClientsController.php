<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\Clients\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\ClientsRequest;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Regions\RegionsRepository;
use App\Services\Redirection\Redirection;

class ClientsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;

    /**
     * @var private
     */
    private $parent;
    private $role       = 'admin';
    private $section    = 'clients';

    public function __construct(ClientsRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
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
        return view(dashboard_path($this->section . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        $create = $this->controller
            ->store();
            //
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
    public function edit($id, RegionsRepository $region)
    {
        $regions = $region->all();

        return view(dashboard_path($this->section . '.edit'), compact('regions'))
            ->withData($this->controller->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request, $id)
    {
        $update = $this->controller
            ->store($id);
            //
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