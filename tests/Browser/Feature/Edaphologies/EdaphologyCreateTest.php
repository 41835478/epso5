<?php

namespace Tests\Browser\Tests\Edaphologies;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\EdaphologyHelpers;

class EdaphologyCreateTest extends DuskTestCase
{
    use EdaphologyHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/edaphologies/create';
    protected $pathToList   = '/dashboard/edaphologies';


    /*
    |--------------------------------------------------------------------------
    | Add Edaphology
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                // ->type('edaphology_name', $this->makeEdaphology()->edaphology_name)
                // ->type('edaphology_description', $this->makeEdaphology()->edaphology_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
