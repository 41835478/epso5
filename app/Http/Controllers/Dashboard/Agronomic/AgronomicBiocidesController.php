<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicBiocides\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicBiocidesRequest as AgronomicRequest;
use App\Repositories\AgronomicBiocides\AgronomicBiocidesRepository;
use App\Repositories\Plots\PlotsRepository;

class AgronomicBiocidesController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section = 'agronomic_biocides';

    public function __construct(AgronomicBiocidesRepository $controller, DataTable $table, PlotsRepository $plot)
    {
        $this->controller   = $controller;
        $this->plot         = $plot;
        $this->table        = $table;
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