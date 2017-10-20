<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicBiocides\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicBiocidesRequest as AgronomicRequest;
use App\Repositories\AgronomicBiocides\AgronomicBiocidesRepository;
use App\Repositories\Plots\PlotsRepository;
use App\Repositories\Workers\WorkersRepository;
use Credentials;

class AgronomicBiocidesController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section = 'agronomic_biocides';
    protected $worker;

    public function __construct(AgronomicBiocidesRepository $controller, DataTable $table, PlotsRepository $plot, WorkersRepository $worker)
    {
        $this->controller   = $controller;
        $this->plot         = $plot;
        $this->table        = $table;
        $this->worker       = $worker;
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Store a newly created resource in storage.
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
        //Check if the user own the database record
        //and if the role is authorizate
        if(!Credentials::authorize($data)) {
            return Credentials::accessError();
        }
        //List of plots
        $plots = $this->plot->listsByUser($data->user_id) ?? null;
        $workers = $this->worker->listsByUser($data->user_id);
            //Return the values
            return view(dashboard_path($this->section . '.edit'), compact('data', 'plots', 'workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  object $request
     * @return \Illuminate\Http\Response
     */
    public function update(AgronomicRequest $request, $id)
    {
        return parent::agronomicUpdate($id);
    }
}