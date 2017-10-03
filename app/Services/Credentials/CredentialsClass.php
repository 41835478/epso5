<?php

namespace App\Services\Credentials;

use App\Repositories\Clients\ClientsRepository;
use App\Services\Credentials\Traits\Authorize;
use App\Services\Credentials\Traits\Config;
use App\Services\Credentials\Traits\Helpers;
use App\Services\Credentials\Traits\Roles;
use App\Services\Credentials\Traits\Users;

class CredentialsClass {

    use Authorize, Config, Helpers, Roles, Users;

    /**
     * @var user
     */
    private $user;

    /**
     * @var The table fields with the boolean flags
     */
    private $tableFields = [
        'is_god',
        'is_admin',
        'is_editor',
        'is_user',
    ];

    /**
     * @var Allowed methods for the Facade
     */
    private $allowed = [
        //Roles
        'hasAnyRoles',
        'hasRoles',
        'role',
        'roleName',
        'userRole',
        'maxRole',

        //Has roles 
        'isGod',
        'isAdmin',
        'isEditor',
        'isUser',
        
        //Users
        'address',
        'agreement',
        'avatar',
        'email',
        'id',
        'locale',
        'name',
        'url',
        'client',
        'tools',

        //Authorize 
        'authorize',
        'accessError',

        //Config 
        'config'
    ];

    /**
     * Create the constructor
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Generate the methods
     *
     * @param  string $method
     * @param  string $parameters
     *
     * @return Boolean
     */
    public function __call($method, $parameters)
    {
        if (isset($this->user) && in_array($method, $this->allowed)) {
            return call_user_func_array([$this, $method], $parameters);
        }
        return __('Method not allowed');
    }
}