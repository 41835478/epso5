<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\MachinesRequest;
use App\Repositories\Machines\MachinesRepository;

class MachinesInspectionController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    /**
     * @var private
     */
    private $role       = 'user';
    private $section    = 'machines';

    public function __construct(MachinesRepository $controller)
    {
        $this->controller   = $controller;
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role,
            'legend'    => $this->section,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        return $id;
    }
}