<?php

namespace Tests\Browser\Tests\Users;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserListTest extends DuskTestCase
{
    protected $dashboard    = '/dashboard';
    protected $pathToList   = '/dashboard/users';

    /*
    |--------------------------------------------------------------------------
    | List users
    |--------------------------------------------------------------------------
    */

    public function test_god_can_show_all_users()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->assertPathIs($this->pathToList)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createGod()->name);
                    $table->assertSee($this->createGod()->client->client_name);
                });
        });
    }

    public function test_admin_can_show_all_users_unless_god()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToList)
                ->assertPathIs($this->pathToList)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createAdmin()->name);
                    $table->assertSee($this->createAdmin()->client->client_name);
                    $table->assertDontSee($this->createGod()->name);
                });
        });
    }

    public function test_editor_can_show_all_his_users()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToList)
                ->assertPathIs($this->pathToList)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createEditor()->name);
                    $table->assertSee($this->createUserBase()->name);
                    $table->assertSee($this->createUserBase()->client->client_name);
                    $table->assertSee($this->createEditor()->client->client_name);
                })
                ->with('.table', function ($table) {
                    $table->assertDontSee($this->createGod()->name);
                    $table->assertDontSee($this->createAdmin()->name);
                });
        });
    }

    public function test_user_cant_see_users()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToList)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
