<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\CitiesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CitiesRequest;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    // /**
    //  * Initialize the constructor
    //  */
    // public function __construct(CitiesRepository $controller, CitiesDataTable $table)
    // {
    //     $this->controller   = $controller;
    //     $this->table        = $table;

    //     //Sharing in the view
    //     view()->share([
    //         'section'   => 'cities',
    //         'role'     => 'admin'
    //     ]);
    // }

    // /**
    //  * Process datatables ajax request.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return $this->table
    //         ->render(dashboard_path('users.index'));
    // }
}

