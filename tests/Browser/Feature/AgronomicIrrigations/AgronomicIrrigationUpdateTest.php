<?php

namespace Tests\Browser\Tests\AgronomicIrrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIrrigationHelpers;
use Tests\Helpers\PlotHelpers;

class AgronomicIrrigationUpdateTest extends DuskTestCase
{
    use AgronomicIrrigationHelpers, PlotHelpers;
    
    protected $route = 'dashboard.user.agronomic_irrigations.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicIrrigations
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_agronomic_irrigation()
    {
        //Variables 
        $plot = $this->whereUserIs($this->lastAgronomicIrrigation()->user_id)->id;
        //Tests
        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicIrrigation()->id)
                ->select('plot_id', $plot)
                ->type('agronomic_date', $this->makeAgronomicIrrigation()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicIrrigation()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicIrrigation()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicIrrigation()->agronomic_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_irrigations', [
            'client_id'                 => $this->lastAgronomicIrrigation()->client_id,
            'user_id'                   => $this->lastAgronomicIrrigation()->user_id,
            'plot_id'                   => $plot,
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
