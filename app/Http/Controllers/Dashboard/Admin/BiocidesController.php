<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\Biocides\DataTable;
use App\Http\Controllers\DashboardController;
use App\Repositories\Biocides\BiocidesRepository;
//use App\Http\Requests\BiocidesRequest;
//use Credentials;
use Illuminate\Http\Request;

class BiocidesController extends DashboardController
{
    /**
     * @var string
     */
    protected $controller;
    protected $role;
    protected $table;

    public function __construct(BiocidesRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        $this->role         = 'admin';
        
        //Sharing in the view
        view()->share([
            'section'   => 'biocides',
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
            //     'action' => 'biocides.actions'
            // ])
            ->render(dashboard_path('biocides.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(dashboard_path('biocides.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BiocidesRequest $request)
    {
        $create = $this->controller
            ->store();

            return $create 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.biocides.index')
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
        return view(dashboard_path('biocides.edit'))
            ->withData($this->controller->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BiocidesRequest $request, $id)
    {
        $update = $this->controller
            ->store($id);

            return $update 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.biocides.index')
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