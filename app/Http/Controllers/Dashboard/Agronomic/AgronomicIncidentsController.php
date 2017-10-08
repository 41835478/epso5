<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicIncidents\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicIncidentsRequest;
use App\Repositories\AgronomicIncidents\AgronomicIncidentsRepository;
use App\Repositories\Plots\PlotsRepository;

class AgronomicIncidentsController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section    = 'agronomic_incidents';

    public function __construct(AgronomicIncidentsRepository $controller, DataTable $table, PlotsRepository $plot)
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
}