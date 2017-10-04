<?php 

namespace App\Repositories\_Traits;

use App\Repositories\Clients\ClientsRepository;
use App\Repositories\Users\UsersRepository;
use Credentials;

trait ClientUser
{
    /**
     * Get clients and users
     * @param   flag  $clients
     * @param   flag  $users
     * 
     * @return  array
     */
    public function getClientUser()
    {
        if(Credentials::isAdmin()) {
            $clients = app(ClientsRepository::class)->listOfClientsByRole();
        } elseif (Credentials::isEditor()) {
            $users = app(UsersRepository::class)->listOfUsersByRole();
        }
        return [$clients ?? null, $users ?? null];
    }
}
