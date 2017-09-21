<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Plots\PlotsRepository;
// use Credentials;
//use Illuminate\Http\Request;

class PlotsConfigurateController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    /**
     * @var private
     */
    private $legend     = 'plots';
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'user';
    private $section    = 'plots';

    public function __construct(PlotsRepository $controller)
    {
        $this->controller   = $controller;
        //Sharing in the view
        view()->share([
            'legend'    => $this->legend,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Show the form for configurate a new plot resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function configurate()
    {  
        list($clients, $users) = $this->controller->getAdministration();
        list($cropTypes, $cropPatterns, $cropVarieties, $cropTrainig) = $this->controller->getCrop();
        //    
        return view(dashboard_path($this->section . '.configurate'), compact('clients', 'cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'users'));
    }
}