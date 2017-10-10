<?php

namespace Tests\Browser\Tests\AgronomicPests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicPestHelpers;
use Tests\Helpers\PestHelpers;
use Tests\Helpers\PlotHelpers;

class AgronomicPestUpdateTest extends DuskTestCase
{
    use AgronomicPestHelpers, PlotHelpers, PestHelpers;
    
    protected $route = 'dashboard.user.agronomic_pests.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicPests
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_AgronomicPests()
    {
        //Variables 
        $plot = $this->whereUserIs($this->lastAgronomicPest()->user_id)->id;
        $pest = $this->pestByCrop($this->lastAgronomicPest()->crop_id)->id;
        //Tests
        $this->browse(function (Browser $browser) use ($pest, $plot) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicPest()->id)
                ->select('plot_id', $plot)
                ->select('pest_id', $pest)
                ->type('agronomic_date', $this->makeAgronomicPest()->agronomic_date)
                ->type('agronomic_observations', $this->makeAgronomicPest()->agronomic_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_pests', [
            'client_id'                 => $this->lastAgronomicPest()->client_id,
            'user_id'                   => $this->lastAgronomicPest()->user_id,
            'plot_id'                   => $plot,
            'pest_id'                   => $pest,
            'agronomic_date'            => date_to_db($this->makeAgronomicPest()->agronomic_date),
            'agronomic_observations'    => $this->makeAgronomicPest()->agronomic_observations,
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
