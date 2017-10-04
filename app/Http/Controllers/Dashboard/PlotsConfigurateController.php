<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\ClimaticStations\ClimaticStationsRepository;
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
    public function configurate(Request $request, ClimaticStationsRepository $stations)
    {  
        //Get variables
        //Not posible to get catastro on a job queue, because we need the user can edit the sigpac...
        $catastro   = catastro($request);
        $sigpac     = catastroToSigpac($catastro);
        $station    = $stations->closest($request);
        list($clients, $users) = $this->controller->getClientUser();
        list($cropTypes, $cropPatterns, $cropVarieties, $cropTrainig) = $this->controller->getCrop();
            //Return the data
            return view(dashboard_path($this->section . '.configurate'), 
                compact('catastro', 'clients', 'cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'sigpac', 'station', 'users')
            );
    }
}