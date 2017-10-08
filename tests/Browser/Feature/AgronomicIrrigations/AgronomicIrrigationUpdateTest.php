<?php

namespace Tests\Browser\Tests\AgronomicIrrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIrrigationHelpers;

class AgronomicIrrigationUpdateTest extends DuskTestCase
{
    use AgronomicIrrigationHelpers;
    
    protected $route = 'dashboard.user.agronomic_irrigations.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicIrrigations
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_agronomic_irrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicIrrigation()->id)
                ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:first-child'))
                ->type('agronomic_date', $this->makeAgronomicIrrigation()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicIrrigation()->agronomic_quantity)
                ->type('agronomic_observations', $this->makeAgronomicIrrigation()->agronomic_observations)
                ->select('agronomic_quantity_unit', $this->makeAgronomicIrrigation()->agronomic_quantity_unit)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_irrigations', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'agronomic_date'            => date_to_db($this->makeAgronomicIrrigation()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicIrrigation()->agronomic_quantity,
            'agronomic_observations'    => $this->makeAgronomicIrrigation()->agronomic_observations,
            'agronomic_quantity_unit'   => $this->makeAgronomicIrrigation()->agronomic_quantity_unit
        ]);
    }

    public function test_user_cant_update_a_item_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicIrrigation()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
