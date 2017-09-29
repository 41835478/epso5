<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\CropVarietyTypes\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\CropVarietyTypesRequest;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Crops\CropsRepository;
//use Credentials;
//use Illuminate\Http\Request;

class CropVarietyTypesController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $crops;

    /**
     * @var private
     */
    private $parent     = 'crops';
    private $role       = 'admin';
    private $section    = 'crop_variety_types';

    public function __construct(CropsRepository $crops, CropVarietyTypesRepository $controller)
    {
        $this->controller   = $controller;
        $this->crops        = $crops;
        //Sharing in the view
        view()->share([
            'parent'    => $this->parent,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crop = $this->crops->find(request('crop'));
        $types = $this->controller->allByCrop(request('crop'));
            return view(dashboard_path($this->section . '.create'), compact('crop', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CropVarietyTypesRequest $request)
    {
        $create = $this->controller
            ->store();

            return $create 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.' . $this->parent . '.index')
                    ->withStatus(__('The item has been create successfuly'))
                : redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([
                    __('An error occurred during the creating process'), 
                    __('If the error persist, please contact with the system administrator')
                ]);
    }
}