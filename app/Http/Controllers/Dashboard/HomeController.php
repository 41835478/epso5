<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;

class HomeController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard.home');
    }
}
