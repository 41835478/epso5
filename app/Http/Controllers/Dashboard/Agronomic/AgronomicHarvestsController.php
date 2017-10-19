<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicHarvests\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicHarvestsRequest as AgronomicRequest;
use App\Repositories\AgronomicHarvests\AgronomicHarvestsRepository;
use App\Repositories\Plots\PlotsRepository;
use Credentials;

class AgronomicHarvestsController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section = 'agronomic_harvests';
    /**
     * @var private
     */
    private $legend = 'agronomic_harvests';

    public function __construct(AgronomicHarvestsRepository $controller, DataTable $table, PlotsRepository $plot)
    {
        $this->controller   = $controller;
        $this->plot         = $plot;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'legend'    => $this->legend,
            'role'      => $this->role,
            'section'   => $this->section,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Use this for a custom $request -> App\Http\Requests\AgronomicHarvestsRequest  as AgronomicRequest
     *
     * @param  object $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgronomicRequest $request)
    {
        return parent::agronomicStore();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Set default data
        $data = $this->controller->find($id);
        $data['module'] = $data->crop->crop_module;
        //Check if the user own the database record
        //and if the role is authorizate
        if(!Credentials::authorize($data)) {
            return Credentials::accessError();
        }
        //List of plots
        $plots = $this->plot->listsByUser($data->user_id) ?? null;
            //Return the values
            return view(dashboard_path($this->section . '.edit'), compact('data', 'plots'));
    }

    /**
     * Store a newly created resource in storage.
     * Use this for a custom $request -> App\Http\Requests\AgronomicHarvestsRequest  as AgronomicRequest
     *
     * @param  object $request
     * @return \Illuminate\Http\Response
     */
    public function update(AgronomicRequest $request, $id)
    {
        return parent::agronomicUpdate($id);
    }
}