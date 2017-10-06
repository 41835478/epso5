<?php

namespace Tests\Browser\Tests\Users;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserCreateTest extends DuskTestCase
{
    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/users/create';
    protected $pathToList   = '/dashboard/users';

    /*
    |--------------------------------------------------------------------------
    | Add users
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('name', $this->makeUser()->name)
                ->type('email', $this->makeUser()->email)
                ->select('locale', 'es')
                ->select('role', 'user')
                ->select('client_id', 2)
                ->type('password', $this->makePassword())
                ->type('password_confirmation', $this->makePassword())
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_user_cant_create_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_god_can_change_role()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->select('role', 'god')
                ->assertSelected('role', 'god');
        });
    }

    public function test_admin_cant_change_role()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('role_name')
                ->assertMissing('role');
        });
    }

    public function test_editor_cant_change_role()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('role_name')
                ->assertMissing('role');
        });
    }

    public function test_god_can_change_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', 2)
                ->assertSelected('client_id', 2);
        });
    }

    public function test_admin_can_change_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', 2)
                ->assertSelected('client_id', 2);
        });
    }

    public function test_editor_cant_change_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('client')
                ->assertMissing('client_id');
        });
    }
}
