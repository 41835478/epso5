<?php

namespace Tests\Browser\Tests\AgronomicCulturals;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicCulturalHelpers;
use Tests\Helpers\PlotHelpers;

class AgronomicCulturalUpdateTest extends DuskTestCase
{
    use AgronomicCulturalHelpers, PlotHelpers;
    
    protected $route = 'dashboard.user.agronomic_culturals.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicCulturals
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_AgronomicCulturals()
    {
        //Variables 
        $plot = $this->whereUserIs($this->lastAgronomicCultural()->user_id)->id;
        //Tests
        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicCultural()->id)
                ->select('plot_id', $plot)
                ->type('agronomic_date', $this->makeAgronomicCultural()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicCultural()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicCultural()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicCultural()->agronomic_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_culturals', [
            'client_id'                 => $this->lastAgronomicCultural()->client_id,
            'user_id'                   => $this->lastAgronomicCultural()->user_id,
            'plot_id'                   => $plot,
            'agronomic_date'            => date_to_db($this->makeAgronomicCultural()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicCultural()->agronomic_quantity,
            'agronomic_observations'    => $this->makeAgronomicCultural()->agronomic_observations,
            'agronomic_quantity_unit'   => $this->makeAgronomicCultural()->agronomic_quantity_unit
        ]);
    }

    public function test_user_cant_update_a_item_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicCultural()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
