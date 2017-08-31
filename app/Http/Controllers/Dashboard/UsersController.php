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

        return $update 
            ? redirect()
                ->route(Credentials::isEditor() 
                    //God, Admin and Editor case
                    ? 'dashboard.editor.users.index' 
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
}
