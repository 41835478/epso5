<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\CropVarieties\DataTable;
use App\Http\Controllers\DashboardController;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use App\Http\Requests\CropVarietiesRequest;
//use Credentials;
//use Illuminate\Http\Request;

class CropVarietiesController extends DashboardController
{
    /**
     * @var string
     */
    protected $controller;
    protected $role;
    protected $table;

    public function __construct(CropVarietiesRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        $this->role         = 'admin';
        
        //Sharing in the view
        view()->share([
            'section'   => 'crop_varieties',
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
            //     'action' => 'crop_varieties.actions'
            // ])
            ->render(dashboard_path('crop_varieties.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(dashboard_path('crop_varieties.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CropVarietiesRequest $request)
    {
        $create = $this->controller
            ->store();

            return $create 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.crop_varieties.index')
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
        return view(dashboard_path('crop_varieties.edit'))
            ->withData($this->controller->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CropVarietiesRequest $request, $id)
    {
        $update = $this->controller
            ->store($id);

            return $update 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.crop_varieties.index')
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