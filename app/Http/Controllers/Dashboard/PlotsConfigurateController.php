<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Plots\PlotsRepository;
use App\Services\Geolocation\Servers\Catastro;
use Illuminate\Http\Request;
// use Credentials;

class PlotsConfigurateController extends DashboardController
{
    /**
     * @var protected
     */
    protected $catastro;
    protected $controller;
    /**
     * @var private
     */
    private $legend     = 'plots';
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'user';
    private $section    = 'plots';

    public function __construct(PlotsRepository $controller, Catastro $catastro)
    {
        $this->catastro   = $catastro;
        $this->controller = $controller;
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
    public function configurate(Request $request)
    {  
        //Get variables
        //Not posible to get catastro on a job queue, because we need the user can edit the sigpac...
        $catastro   = catastro($request);
        $sigpac     = catastroToSigpac($catastro);
        list($clients, $users) = $this->controller->getAdministration();
        list($cropTypes, $cropPatterns, $cropVarieties, $cropTrainig) = $this->controller->getCrop();
        //    
        return view(dashboard_path($this->section . '.configurate'), compact('catastro', 'clients', 'cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'sigpac', 'users'));
    }
}