<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\Clients\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\ClientsRequest;
use App\Repositories\Clients\ClientsRepository;
use App\Services\Redirection\Redirection;
//use Credentials;

class ClientsController extends DashboardController
{
    /**
     * @var string
     */
    protected $controller;
    protected $role;
    protected $table;

    public function __construct(ClientsRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        $this->role         = 'admin';
        
        //Sharing in the view
        view()->share([
            'section'   => 'clients',
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
            // ->setValue([
            //     'action' => 'clients.actions'
            // ])
            ->render(dashboard_path('clients.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(dashboard_path('clients.create'));
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
                    ->route('dashboard.' . $this->role . '.clients.index')
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
        return view(dashboard_path('clients.edit'))
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
                    ->route('dashboard.' . $this->role . '.clients.index')
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