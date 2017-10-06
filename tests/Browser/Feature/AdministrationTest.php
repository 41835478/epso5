<?php

namespace Tests\Browser\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\UserHelpers;

class AdministrationTest extends DuskTestCase
{
    use UserHelpers;

    protected $pathTo       = '/dashboard/administrations/1/edit';
    protected $dashboard    = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Administrations
    |--------------------------------------------------------------------------
    */

    public function test_god_can_access_administrations()
    {
        $this->browse(function (Browser $browser) {
            //The test
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathTo)
                ->assertPathIs($this->pathTo)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });
    }

    public function test_admin_cant_access_administrations()
    {
        $this->browse(function (Browser $browser) {
            //The test
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathTo)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_editor_cant_access_administrations()
    {
        $this->browse(function (Browser $browser) {
            //The test
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathTo)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_access_administrations()
    {
        $this->browse(function (Browser $browser) {
            //The test
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->pathTo)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
