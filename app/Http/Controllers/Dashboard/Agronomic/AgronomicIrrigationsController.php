<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicIrrigations\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Http\Requests\AgronomicIrrigationsRequest;
use App\Repositories\AgronomicIrrigations\AgronomicIrrigationsRepository;
use App\Repositories\Plots\PlotsRepository;

class AgronomicIrrigationsController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section    = 'agronomic_irrigations';

    public function __construct(AgronomicIrrigationsRepository $controller, DataTable $table, PlotsRepository $plot)
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