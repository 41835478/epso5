<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicHarvests\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicHarvestsRequest as AgronomicRequest;
use App\Repositories\AgronomicHarvests\AgronomicHarvestsRepository;
use App\Repositories\Plots\PlotsRepository;

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
     *
     * @param  object $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgronomicRequest $request)
    {
        return parent::agronomicStore();
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