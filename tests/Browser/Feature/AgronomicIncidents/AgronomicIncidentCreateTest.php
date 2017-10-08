<?php

namespace Tests\Browser\Tests\AgronomicIncidents;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIncidentHelpers;

class AgronomicIncidentCreateTest extends DuskTestCase
{
    use AgronomicIncidentHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_incidents/create';
    protected $pathToList   = '/dashboard/agronomic_incidents';


    /*
    |--------------------------------------------------------------------------
    | Add AgronomicIncident
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_agronomicincident()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                // ->type('agronomicincident_name', $this->makeAgronomicIncident()->agronomicincident_name)
                // ->type('agronomicincident_description', $this->makeAgronomicIncident()->agronomicincident_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_incidents', [
            'agronomicincident_name'           => $this->makeMachine()->agronomicincident_name,
            // 'agronomicincident_description'    => $this->makeMachine()->agronomicincident_description,
        ]);
    }

    public function test_admin_can_create_agronomicincident()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_agronomicincident()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_agronomicincident()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
