<?php

namespace Tests\Browser\Tests\AgronomicBiocides;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicBiocideHelpers;
use Tests\Helpers\PlotHelpers;

class AgronomicBiocideUpdateTest extends DuskTestCase
{
    use AgronomicBiocideHelpers, PlotHelpers;
    
    protected $route = 'dashboard.user.agronomic_biocides.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicBiocides
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_AgronomicBiocides()
    {
        //Variables 
        $plot = $this->whereUserIs($this->lastAgronomicBiocide()->user_id)->id;
        //Tests
        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicBiocide()->id)
                ->select('plot_id', $plot)
                ->type('agronomic_date', $this->makeAgronomicBiocide()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicBiocide()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicBiocide()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicBiocide()->agronomic_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_biocides', [
            'client_id'                 => $this->lastAgronomicBiocide()->client_id,
            'user_id'                   => $this->lastAgronomicBiocide()->user_id,
            'plot_id'                   => $plot,
            'agronomic_date'            => date_to_db($this->makeAgronomicBiocide()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicBiocide()->agronomic_quantity,
            'agronomic_observations'    => $this->makeAgronomicBiocide()->agronomic_observations,
            'agronomic_quantity_unit'   => $this->makeAgronomicBiocide()->agronomic_quantity_unit
        ]);
    }

    public function test_user_cant_update_a_item_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicBiocide()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
