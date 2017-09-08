<?php

namespace Tests\Browser\Tests\Irrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\IrrigationHelpers;

class IrrigationCreateTest extends DuskTestCase
{
    use IrrigationHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/irrigations/create';
    protected $pathToList   = '/dashboard/irrigations';


    /*
    |--------------------------------------------------------------------------
    | Add biocide
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_irrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('irrigation_name', $this->makeIrrigation()->irrigation_name)
                ->type('irrigation_description', $this->makeIrrigation()->irrigation_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_irrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_irrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_irrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
