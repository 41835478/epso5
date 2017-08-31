<?php

namespace Tests\Feature;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\BrowserKitTestCase;

class UserAccessTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    private $admin;
    private $editor;
    private $god;
    private $user;
    private $usersURL;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->god          = User::find(1);
        $this->admin        = User::find(2);
        $this->editor       = User::find(3);
        $this->user         = User::find(4);
        $this->usersURL     = '/dashboard/users';
     }

    /*
    |--------------------------------------------------------------------------
    | Access to user page
    |--------------------------------------------------------------------------
    */
    public function test_god_can_access_to_users_list()
    {
        $response = $this->actingAs($this->god)
            ->visit($this->usersURL)
            ->seePageIs($this->usersURL); 
    }

    public function test_admin_can_access_to_users_list()
    {
        $response = $this->actingAs($this->admin)
            ->visit($this->usersURL)
            ->seePageIs($this->usersURL); 
    }

    public function test_editor_can_access_to_users_list()
    {
        $response = $this->actingAs($this->editor)
            ->visit($this->usersURL)
            ->seePageIs($this->usersURL);
    }

    public function test_user_cant_access_to_users_list()
    {
        $response = $this->actingAs($this->user)
            ->visit($this->usersURL)
            ->seePageIs('/dashboard')
            ->seeText(__('Your are not authorized to access this section'));
    }
}
