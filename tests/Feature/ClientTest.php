<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\BrowserKitTestCase;

class ClientTest extends BrowserKitTestCase
{
    private $usersURL = 'https://localhost/dashboard/clients';
    private $dashboard  = 'https://localhost/dashboard';
    
    /*
    |--------------------------------------------------------------------------
    | Access to client's page
    |--------------------------------------------------------------------------
    */
    public function test_god_can_access_to_clients_list()
    {
        $response = $this->actingAs($this->createGod())
            ->visit($this->usersURL)
            ->seePageIs($this->usersURL); 
    }

    public function test_admin_can_access_to_clients_list()
    {
        $response = $this->actingAs($this->createAdmin())
            ->visit($this->usersURL)
            ->seePageIs($this->usersURL); 
    }

    public function test_editor_can_access_to_clients_list()
    {
        $response = $this->actingAs($this->createEditor())
            ->visit($this->usersURL)
            ->seePageIs($this->dashboard)
            ->seeText(__('Your are not authorized to access this section'));
    }

    public function test_user_cant_access_to_clients_list()
    {
        $response = $this->actingAs($this->createUser())
            ->visit($this->usersURL)
            ->seePageIs($this->dashboard)
            ->seeText(__('Your are not authorized to access this section'));
    }
}
