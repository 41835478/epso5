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

    public function test_god_can_create_a_agronomic_incident()
    {
        //Tests
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', 1)->pause(1000)
                ->select('user_id', 1)->pause(1000)
                ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:last-child'))
                ->type('agronomic_date', $this->makeAgronomicIncident()->agronomic_date)
                ->type('agronomic_observations', $this->makeAgronomicIncident()->agronomic_observations)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_incidents', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'agronomic_date'            => date_to_db($this->makeAgronomicIncident()->agronomic_date),
            'agronomic_observations'    => $this->makeAgronomicIncident()->agronomic_observations,
        ]);
    }

    public function test_admin_can_create_agronomic_incident()
        {
            $this->browse(function (Browser $browser) {
                $browser->loginAs($admin = $this->createAdmin())
                    ->visit($this->pathToCreate)
                    ->assertPathIs($this->pathToCreate)
                    ->assertVisible('#client_id')
                    ->assertVisible('#user_id')
                    ->assertVisible('#plot_id');
            });
        }

        public function test_editor_can_create_agronomic_incident()
        {
            $this->browse(function (Browser $browser) {
                $browser->loginAs($editor = $this->createEditor())
                    ->visit($this->pathToCreate)
                    ->assertPathIs($this->pathToCreate)
                    ->assertMissing('#client_id')
                    ->assertVisible('#user_id')
                    ->assertVisible('#plot_id');
            });
        }

        public function test_user_can_create_agronomic_incident()
        {
            $this->browse(function (Browser $browser) {
                $browser->loginAs($user = $this->createUserBase())
                    ->visit($this->pathToCreate)
                    ->assertPathIs($this->pathToCreate)
                    ->assertMissing('#client_id')
                    ->assertMissing('#user_id')
                    ->assertVisible('#plot_id');
            });
        }
}
