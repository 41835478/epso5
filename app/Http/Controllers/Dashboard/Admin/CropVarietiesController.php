<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\CropVarieties\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\CropVarietiesRequest;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Crops\CropsRepository;

class CropVarietiesController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $crop;
    protected $table;
    protected $type;

    /**
     * @var private
     */
    private $parent     = 'crops';
    private $role       = 'admin';
    private $section    = 'crop_varieties';

    public function __construct(CropVarietiesRepository $controller, CropsRepository $crop, DataTable $table)
    {
        $this->controller   = $controller;
        $this->crop         = $crop;
        $this->table        = $table;
        
        //Sharing in the view
        view()->share([
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
        //Crop ID
        $crops = $this->crop->find($id) ?? null;
            return $this->table
                ->render(dashboard_path($this->section . '.index'), compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CropVarietyTypesRepository $type)
    {
        $crop   = $this->crop->find(request('crop'));
        $types  = ($crop->crop_type > 0) ? $type->selectByCrop($crop->id): [];
            return view(dashboard_path($this->section . '.create'), compact('crop', 'types'));
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
                    ->route('dashboard.' . $this->role . '.' . $this->section . '.show', request('crop_id'))
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
    public function edit($id, $cropId, CropVarietyTypesRepository $type)
    {
        $crop   = $this->crop->find($cropId);
        $types  = ($crop->crop_type > 0) ? $type->selectByCrop($crop->id): [];
            return view(dashboard_path($this->section . '.edit'), compact('crop', 'types'))
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
                    ->route('dashboard.' . $this->role . '.' . $this->section . '.show', request('crop_id'))
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