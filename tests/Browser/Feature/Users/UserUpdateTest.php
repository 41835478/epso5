<?php

namespace Tests\Browser\Tests\Users;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserUpdateTest extends DuskTestCase
{
    protected $editRoute    = 'dashboard.user.users.edit';
    protected $locale       = 'en';
    protected $twitter      = '@exampleTwitter.com';

    /*
    |--------------------------------------------------------------------------
    | Update users
    |--------------------------------------------------------------------------
    */
    public function test_user_can_update_his_profile()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->editRoute, $this->createUserBase()->id)
                ->type('name', $this->makeUser()->name)
                ->type('email', $this->makeUser()->email)
                ->select('locale', $this->locale)
                ->type('password', $this->makePassword())
                ->type('password_confirmation', $this->makePassword())
                ->type('profile_social_twitter', $this->twitter)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('users', [
            'name'      => $this->makeUser()->name,
            'email'     => $this->makeUser()->email,
            'locale'    => $this->locale,
        ]);
    
        $this->assertDatabaseHas('profiles', [
            'user_id'                   => $this->createUserBase()->id,
            'profile_social_twitter'    => $this->twitter,
        ]);
    }
}
