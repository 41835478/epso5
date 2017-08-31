<?php
/**
 * @middleware: editor
 */

namespace App\Http\Controllers\Dashboard\Editor;

use App\DataTables\Users\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\UsersRequest;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Users\UsersRepository;

class UsersController extends DashboardController
{
    /**
     * @var string
     */
    protected $controller;
    protected $table;

    /**
     * Constructo initialization
     */
    public function __construct(UsersRepository $controller, DataTable $table)
    {
        $this->controller = $controller;
        $this->table = $table;

        //Sharing in the view
        view()->share([
            'section'   => 'users',
            'role'     => 'editor'
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->table
            ->setValue([
                'action' => 'users.actions'
            ])
            ->render(dashboard_path('users.index'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(ClientsRepository $client)
    {
        $clients = $client->lists(['id', 'client_name'], set_true('I want the firt option field empty!!!'));
        //
        return view(dashboard_path('users.create'), compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $create = $this->controller
            ->store();
        //
        return $create 
            ? redirect()
                ->route('dashboard.editor.users.index')
                ->withStatus(__('The item has been create successfuly'))
            : redirect()
                ->back()
                ->withInput()
                ->withErrors([
                __('An error occurred during the creating process'), 
                __('If the error persist, please contact with the system administrator')
            ]);
    }
}
