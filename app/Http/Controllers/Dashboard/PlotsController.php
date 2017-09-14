<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Plots\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\PlotsRequest;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\CropVarieties\CropVarietiesRepository;
use App\Repositories\CropVarietyTypes\CropVarietyTypesRepository;
use App\Repositories\Patterns\PatternsRepository;
use App\Repositories\Plots\PlotsRepository;
use App\Repositories\Users\UsersRepository;
// use Credentials;
//use Illuminate\Http\Request;

class PlotsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;
    /**
     * @var private
     */
    private $legend     = 'plots';
    private $parent;    //Just in case we need a parent section like: crops > crops_varieties, the parent section will be: crops
    private $role       = 'user';
    private $section    = 'plots';
    private $type;
    private $variety;

    public function __construct(CropVarietyTypesRepository $type, CropVarietiesRepository $variety, DataTable $table, PlotsRepository $controller)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        $this->type         = $type;
        $this->variety      = $variety;
        //Sharing in the view
        view()->share([
            'legend'    => $this->legend,
            //'parent'   => $this->parent,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->table
            ->render(dashboard_path($this->section . '.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PatternsRepository $pattern, ClientsRepository $client)
    {
        list($clients, $users) = $this->controller->getAdministration();
        $cropTypes      = $this->type->selectByCrop($cropId = getCropId()) ?? null;
        $cropPatterns   = $pattern->selectByCrop($cropId = getCropId()) ?? null;
        $cropVarieties  = $this->variety->selectByCrop($cropId = getCropId()) ?? [];
        $cropTrainig    = $client->find(getClientId())->training->pluck('training_name', 'id')->toArray() ?? [];
            return view(dashboard_path($this->section . '.create'), compact('cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties'))            
                ->withClients($clients)
                ->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlotsRequest $request)
    {
        $create = $this->controller->store();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ClientsRepository $client, PatternsRepository $pattern, UsersRepository $user)
    {
        $data           = $this->controller->find($id);
        $cropTypes      = $this->type->selectByCrop($cropId = $data->crop_id) ?? [];
        $cropPatterns   = $pattern->selectByCrop($cropId = $data->crop_id) ?? [];
        $cropVarieties  = $this->variety->selectByCrop($cropId = $data->crop_id, $cropVaiety = $data->crop_variety_type) ?? [];
        $cropTrainig    = $client->find(getClientId())->training->pluck('training_name', 'id')->toArray() ?? [];
            return view(dashboard_path($this->section . '.edit'), compact('cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'data'))
                ->withUsers($user->listOfUsersByRole($client = $data->client_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlotsRequest $request, $id)
    {
        $update = $this->controller->store($id);
            return $update 
                ? redirect()
                    ->route('dashboard.' . $this->role . '.' . $this->section . '.index')
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