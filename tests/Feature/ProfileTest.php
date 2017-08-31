<?php

namespace Tests\Feature;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\BrowserKitTestCase;
use Credentials;

class ProfileTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    private $admin;
    private $fakeUser;
    private $locale;
    private $password;
    private $profileRoute;
    private $user;
    private $url;

    public function setUp()
    {
        parent::setUp();

        $this->god      = User::find(1);
        $this->admin    = User::find(2);
        $this->editor   = User::find(3);
        $this->user     = User::find(4);
        $this->fakeUser = factory(User::class)->create();

        $this->locale       = 'en';
        $this->password     = '1234';
        $this->profileRoute = 'dashboard.user.users.edit';
        $this->usersRoute   = 'dashboard.editor.users.index';
        $this->url          = 'http://www.google.es';
    }

/*
|--------------------------------------------------------------------------
| See Profile
|--------------------------------------------------------------------------
*/
    public function test_user_can_see_his_profile()
    {
        $response = $this->actingAs($this->user)
        ->get(route($this->profileRoute, $this->user->id))
        ->seeInField('name', $this->user->name)
        ->seeInField('email', $this->user->email)
        ->seeIsSelected('locale', $this->user->locale)
        ->see('<input type="text" name="role_name" id="role_name" class="form-control" value="user" disabled="disabled">')
        ->see('<input type="text" name="client.client_name" value="EPSO" id="client.client_name" class="form-control" disabled="disabled">')
        ->see('<input type="hidden" name="client_id" value="1" id="client_id">')
        ->assertResponseStatus(200);
    }

    public function test_user_cant_see_other_user_profile()
    {
        $response = $this->actingAs($this->user)
            ->get(route($this->profileRoute, $this->fakeUser->id))
            ->assertResponseStatus(302); // Status: Not found
    }
}
