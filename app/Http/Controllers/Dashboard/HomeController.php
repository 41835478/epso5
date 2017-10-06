<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Plots\Plot;

class HomeController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;

    /**
     * @var private
     */
    private $legend;
    private $parent;
    private $role       = 'user';
    private $section    = 'home';

    public function __construct()
    {
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard.home');
    }
}
