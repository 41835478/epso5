<?php

namespace Tests\Browser\Tests\AgronomicHarvests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicHarvestHelpers;
use Tests\Helpers\PlotHelpers;

class AgronomicHarvestUpdateTest extends DuskTestCase
{
    use AgronomicHarvestHelpers, PlotHelpers;
    
    protected $route = 'dashboard.user.agronomic_harvests.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicHarvests
    |--------------------------------------------------------------------------
    */
   public function test_god_can_update_a_AgronomicHarvests()
   {
       //Variables 
       $plot = $this->whereClientIs(2)->id;
       //Tests
       $this->browse(function (Browser $browser) use ($plot) {
           $browser->loginAs($god = $this->createGod())
               ->visitRoute($this->route, $this->lastAgronomicHarvest()->id)
               ->select('plot_id', $plot)
               ->type('agronomic_date', $this->makeAgronomicHarvest()->agronomic_date)
               ->type('agronomic_quantity', $this->makeAgronomicHarvest()->agronomic_quantity)
               ->select('agronomic_quantity_unit', $this->makeAgronomicHarvest()->agronomic_quantity_unit)
               ->type('agronomic_observations', $this->makeAgronomicHarvest()->agronomic_observations)
               ->type('agronomic_ph', 1)
               ->type('agronomic_baume', 10)
               ->type('agronomic_acidity', 20)
               ->type('agronomic_poliphenol', 30)
               ->type('agronomic_anthocyanin_total', 40)
               ->type('agronomic_anthocyanin_removable', 50)
               ->press(trans('buttons.edit'))
               ->assertSee(__('The items has been updated successfuly'));
       });

       $this->assertDatabaseHas('agronomic_harvests', [
           'client_id'                 => $this->lastAgronomicHarvest()->client_id,
           'user_id'                   => $this->lastAgronomicHarvest()->user_id,
           'plot_id'                   => $plot,
           'agronomic_date'            => date_to_db($this->makeAgronomicHarvest()->agronomic_date),
           'agronomic_quantity'        => $this->makeAgronomicHarvest()->agronomic_quantity,
           'agronomic_observations'    => $this->makeAgronomicHarvest()->agronomic_observations,
           'agronomic_quantity_unit'   => $this->makeAgronomicHarvest()->agronomic_quantity_unit,
           'agronomic_ph'                      => 1,
           'agronomic_baume'                   => 10,
           'agronomic_acidity'                 => 20,
           'agronomic_poliphenol'              => 30,
           'agronomic_anthocyanin_total'       => 40,
           'agronomic_anthocyanin_removable'   => 50,
       ]);
   }

    public function test_admin_can_update_a_AgronomicHarvests()
    {
        //Variables 
        $plot = $this->whereUserIs($this->lastAgronomicHarvest()->user_id)->id;
        //Tests
        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicHarvest()->id)
                ->select('plot_id', $plot)
                ->type('agronomic_date', $this->makeAgronomicHarvest()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicHarvest()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicHarvest()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicHarvest()->agronomic_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_harvests', [
            'client_id'                 => $this->lastAgronomicHarvest()->client_id,
            'user_id'                   => $this->lastAgronomicHarvest()->user_id,
            'plot_id'                   => $plot,
            'agronomic_date'            => date_to_db($this->makeAgronomicHarvest()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicHarvest()->agronomic_quantity,
            'agronomic_observations'    => $this->makeAgronomicHarvest()->agronomic_observations,
            'agronomic_quantity_unit'   => $this->makeAgronomicHarvest()->agronomic_quantity_unit
        ]);
    }

    public function test_user_cant_update_a_item_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicHarvest()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
