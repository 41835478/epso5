<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Climatics\ClimaticsRepository;
use App\Http\Requests\ClimaticsRequest;
//use Credentials;
//use Illuminate\Http\Request;

class ClimaticsController extends DashboardController
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
    private $role       = 'user';
    private $section    = 'climatics';

    public function __construct(ClimaticsRepository $controller)
    {
        $this->controller   = $controller;
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
    public function graph()
    {
        return view(dashboard_path($this->section . '.graph'));
    }
}