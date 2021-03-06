<?php

namespace App\Http\Controllers\Dashboard\God;

use App\Http\Controllers\DashboardController;
use App\Repositories\Administrations\AdministrationsRepository;
//use Credentials;
use Illuminate\Http\Request;

class AdministrationsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    /**
     * @var private
     */
    private $legend;    //Just in case we need to customize the lengend. Just use the legend file name.
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'god';
    private $section    = 'administrations';

    public function __construct(AdministrationsRepository $controller)
    {
        $this->controller   = $controller;
        //Sharing in the view
        view()->share([
            //'legend'   => $this->legend,
            //'parent'   => $this->parent,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
        //Middleware
        //$this->middleware('role:admin');
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
    public function update(Request $request, $id)
    {
        $update = $this->controller->store($id);
            return $update 
                ? redirect()
                    ->back()
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