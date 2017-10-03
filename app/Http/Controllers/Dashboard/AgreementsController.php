<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Administrations\AdministrationsRepository;
use App\Repositories\Users\UsersRepository;
use Credentials;
use Illuminate\Http\Request;

class AgreementsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $administration;
    /**
     * @var private
     */
    private $section    = 'agreements';
    private $role       = 'user';


    public function __construct(UsersRepository $controller, AdministrationsRepository $administration)
    {
        $this->administration   = $administration;
        $this->controller       = $controller;
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->administration->find(1);
            return view(dashboard_path($this->section . '.edit'), compact('data'))
                ->withText($this->agreement($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = $this->controller->agreement($id);
            return $update 
                ? redirect()
                    ->route('dashboard')
                    ->withStatus(__('The user access conditions has been accepted'))
                : redirect()
                    ->route('dashboard')
                    ->withInput()
                    ->withErrors([
                    __('An error occurred during the updating process'), 
                    __('If the error persist, please contact with the system administrator')
                ]);
    }

    /**
     * Text for agreement
     */
    private function agreement($text) {
        return trans('legals.conditions', [
            'ApplicationName'           => $text->administration_app_name,
            'ApplicationUrl'            => $text->administration_app_url,
            'ApplicationOwnerName'      => $text->administration_app_owner_name,
            'ApplicationOwnerNif'       => $text->administration_app_owner_nif,
            'ApplicationOwnerAddress'   => $text->administration_app_owner_address,
            'ApplicationOwnerEmail'     => $text->administration_app_owner_email,
            'ApplicationOwnerZip'       => $text->administration_app_owner_zip,
            'ApplicationOwnerCity'      => $text->administration_app_owner_city,
            'ApplicationOwnerRegion'    => $text->administration_app_owner_region,
            'ApplicationOwnerCountry'   => $text->administration_app_owner_country,
            'HostingName'               => $text->administration_hosting_name,
            'HostingNif'                => $text->administration_hosting_nif,
            'HostingAddress'            => $text->administration_hosting_address,
            'HostingRegister'           => $text->administration_hosting_register,
            'HostingConditions'         => $text->administration_hosting_conditions_url,
            'ClientName'                => getConfig('client', 'name'),
            'ClientEmail'               => getConfig('client', 'email'),
            'ClientNif'                 => getConfig('client', 'nif'),
            'ClientAddress'             => getConfig('client', 'address'),
            'ClientCity'                => getConfig('client', 'city'),
            'ClientRegion'              => getConfig('client', 'region'),
            'ClientZip'                 => getConfig('client', 'zip'),
        ]);
    }
}