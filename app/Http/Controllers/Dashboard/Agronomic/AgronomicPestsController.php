<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicPests\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicPestsRequest as AgronomicRequest;
use App\Repositories\AgronomicPests\AgronomicPestsRepository;
use App\Repositories\Pests\PestsRepository;
use App\Repositories\Plots\PlotsRepository;
use Credentials;

class AgronomicPestsController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section = 'agronomic_pests';
    protected $pest;

    public function __construct(AgronomicPestsRepository $controller, DataTable $table, PestsRepository $pest, PlotsRepository $plot)
    {
        $this->controller   = $controller;
        $this->pest         = $pest;
        $this->plot         = $plot;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get the users and the clients
        list($clients, $users) = $this->controller->getClientUser();
        $plots = $this->plot->listsIfOnlyUser();
        $pests = $this->pest->listByCropAndRole();
            //Get the value
            return view(dashboard_path($this->section . '.create'), compact('clients', 'pests', 'plots', 'users'));
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
        $pests = $this->pest->listByCropAndRole($data->crop_id);
            //Return the values
            return view(dashboard_path($this->section . '.edit'), compact('data', 'pests', 'plots'));
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