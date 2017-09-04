<?php

namespace Tests\Feature;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\BrowserKitTestCase;

class ProfileTest extends BrowserKitTestCase
{
    protected $profileRoute = 'dashboard.user.users.edit';

/*
|--------------------------------------------------------------------------
| See Profile
|--------------------------------------------------------------------------
*/
    public function test_user_can_see_his_profile()
    {
        $response = $this->actingAs($this->createUser())
        ->get(route($this->profileRoute, $this->createUser()->id))
        ->seeInField('name', $this->createUser()->name)
        ->seeInField('email', $this->createUser()->email)
        ->seeIsSelected('locale', $this->createUser()->locale)
        ->see('<input type="hidden" name="client_id" value="' . $this->createUser()->client_id . '" id="client_id">')
        ->assertResponseStatus(200);
    }

    public function test_user_cant_see_other_user_profile()
    {
        $response = $this->actingAs($this->createUser())
            ->get(route($this->profileRoute, $this->makeUser()->id))
            ->assertResponseStatus(302); // Status: Not found
    }
}
