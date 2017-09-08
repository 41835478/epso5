<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\Patterns\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\PatternsRequest;
use App\Repositories\Crops\CropsRepository;
use App\Repositories\Patterns\PatternsRepository;
//use Credentials;
//use Illuminate\Http\Request;

class PatternsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $crop;
    protected $table;

    /**
     * @var private
     */
    private $parent     = 'crops';
    private $role       = 'admin';
    private $section    = 'patterns';

    public function __construct(PatternsRepository $controller, CropsRepository $crop, DataTable $table)
    {
        $this->controller   = $controller;
        $this->crop         = $crop;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role,
            'parent'    => $this->parent,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crops = $this->crop->find($id);
            return $this->table
                ->render(dashboard_path($this->section . '.index'), compact('crops'));
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
    public function store(PatternsRequest $request)
    {
        $create = $this->controller->store();
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
    public function update(PatternsRequest $request, $id)
    {
        $update = $this->controller->store($id);
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