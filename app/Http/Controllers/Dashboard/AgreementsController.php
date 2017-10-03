<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Users\UsersRepository;
use Credentials;
use Illuminate\Http\Request;

class AgreementsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;

    public function __construct(UsersRepository $controller)
    {
        $this->controller   = $controller;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return 'Accept the conditions';
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
                    ->route('dashboard')
                    ->withStatus(__('The user access conditions has been accepted'))
                : redirect()
                    ->route('dashboard')
                    ->withInput()
                    ->withErrors([
                    __('An error occurred during the updating process'), 
                    __('If the error persist, please contact with the system administrator')
                ]);
    }
}