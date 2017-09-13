<?php

namespace App\Http\Controllers\Dashboard\Editor;

use App\DataTables\Plots\DataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Plots\PlotsRepository;

class PlotsAssignController extends Controller
{
    /**
     * @var protected
     */
    protected $controller;
    protected $table;

    /**
     * @var private
     */
    private $legend     = 'plots';
    private $role       = 'editor';
    private $section    = 'plots';

    public function __construct(PlotsRepository $controller, DataTable $table)
    {
        $this->controller   = $controller;
        $this->table        = $table;
        //Sharing in the view
        view()->share([
            'legend'    => $this->legend,
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Get a list of plot without user
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        dd('Hellow');
        return $this->table
            //Customize the action for datatables [dashboard/_components/actions]
            // ->setValue([
            //     'action' => 'plots:action'
            // ])
            ->render(dashboard_path($this->section . '.index'));
    }
}
