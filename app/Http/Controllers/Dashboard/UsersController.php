<?php
/**
 * @middleware: users
 */

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Users\DataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\UsersRequest;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Users\UsersRepository;
use Credentials;

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
            'section' => 'users',
            'role' => 'user'
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Only editor can access this
        if(!Credentials::isEditor()) {
            return Credentials::accessError();
        }
        //
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
        //Only editor can access this
        if(!Credentials::isEditor()) {
            return Credentials::accessError();
        }
        //
        $clients = $client->lists(['id', 'client_name'], set_true('I want the firt option field empty!!!'));
        return view(dashboard_path('users.create'), compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, ClientsRepository $client)
    {
        $clients = $client->lists(['id', 'client_name'], set_true('I want the firt option field empty!!!'));
        $data = $this->controller
            ->find($id);
        //Check if the user own the database record
        //and if the role is authorizate
        if(!Credentials::authorize($data)) {
            return Credentials::accessError();
        }
        return view(dashboard_path('users.edit'), compact('clients', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        //Check if the user own the database record
        //and if the role is authorizate in: App\Repositories\Repository
        $update = $this->controller
            ->store($id);
        //
        return $update 
            ? redirect()
                ->route(Credentials::isEditor() 
                    //God, Admin and Editor case
                    ? 'dashboard.user.users.index' 
                    //User case
                    : 'dashboard.user.users.edit', Credentials::id()
                )
                ->withStatus(__('The items has been updated successfuly'))
            : redirect()
                ->back()
                ->withInput()
                ->withErrors([
                __('An error occurred during the updating process'), 
                __('If the error persist, please contact with the system administrator')
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //Only editor can access this
        if(!Credentials::isEditor()) {
            return Credentials::accessError();
        }
        //
        $create = $this->controller
            ->store();
        //
        return $create 
            ? redirect()
                ->route('dashboard.user.users.index')
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
