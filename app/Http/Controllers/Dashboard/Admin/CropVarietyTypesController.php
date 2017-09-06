<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\CropVarietyTypes\DataTable;
use App\Http\Controllers\DashboardController;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Http\Requests\CropVarietyTypesRequest;
//use Credentials;
//use Illuminate\Http\Request;

class CropVarietyTypesController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;

    /**
     * @var private
     */
    private $role       = 'admin';
    private $section    = 'crops';

    public function __construct(CropVarietyTypesRepository $controller)
    {
        $this->controller   = $controller;
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
}