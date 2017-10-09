<?php

namespace Tests\Browser\Tests\AgronomicPests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicPestHelpers;

class AgronomicPestUpdateTest extends DuskTestCase
{
    use AgronomicPestHelpers;
    
    protected $route = 'dashboard.user.agronomic_pests.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicPests
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_AgronomicPests()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicPest()->id)
                ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:first-child'))
                ->type('agronomic_date', $this->makeAgronomicPest()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicPest()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicPest()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicPest()->agronomic_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_pests', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'agronomic_date'            => date_to_db($this->makeAgronomicPest()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicPest()->agronomic_quantity,
            'agronomic_observations'    => $this->makeAgronomicPest()->agronomic_observations,
            'agronomic_quantity_unit'   => $this->makeAgronomicPest()->agronomic_quantity_unit
        ]);
    }

    public function test_user_cant_update_a_item_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicPest()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
