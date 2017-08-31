<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CitiesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CitiesRequest;
use App\Repositories\Cities\Contracts\CitiesInterface;
use App\Repositories\Regions\Contracts\RegionsInterface;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Initialize the constructor
     */
    public function __construct(CitiesInterface $controller, CitiesDataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;

        //Sharing in the view
        view()->share([
            'section'   => 'cities',
            'role'     => 'admin'
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->table
            ->render(dashboard_path('users.index'));
    }
}

