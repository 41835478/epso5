<?php

namespace App\Http\Controllers\Dashboard\Editor;

use App\DataTables\Plots\DataTable;
use App\Http\Controllers\DashboardController;
use App\Repositories\Plots\PlotsRepository;

class PlotsAssignController extends DashboardController
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
    private $role       = 'user';//Warning, this is because we want to keep all the links, like: create, edit or index. See the $route variable in assign.blade.php!!!
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
        return $this->table
            //Customize the action for datatables [dashboard/_components/actions]
            //Return only row without users
            ->setValue([
                'no_users' => true
            ])
            ->render(dashboard_path($this->section . '.assign'));
    }
}
