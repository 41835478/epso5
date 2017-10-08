<?php

namespace Tests\Browser\Tests\AgronomicIncidents;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIncidentHelpers;

class AgronomicIncidentUpdateTest extends DuskTestCase
{
    use AgronomicIncidentHelpers;
    
    protected $route = 'dashboard.user.agronomic_incidents.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicIncidents
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_agronomicincident()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicIncident()->id)
                ->type('agronomicincident_name', $this->makeAgronomicIncident()->agronomicincident_name)
                // ->type('agronomicincident_description', $this->makeAgronomicIncident()->agronomicincident_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_incidents', [
            'agronomicincident_name'           => $this->makeAgronomicIncident()->agronomicincident_name,
            // 'agronomicincident_description'    => $this->makeAgronomicIncident()->agronomicincident_description,
        ]);
    }

    public function test_user_cant_update_a_item_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicIncident()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
