<?php

namespace Tests\Browser\Tests\AgronomicHarvests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicHarvestHelpers;

class AgronomicHarvestCreateTest extends DuskTestCase
{
    use AgronomicHarvestHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_harvests/create';
    protected $pathToList   = '/dashboard/agronomic_harvests';


    /*
    |--------------------------------------------------------------------------
    | Add AgronomicHarvest
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_AgronomicHarvests()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', 1)->pause(1000)
                ->select('user_id', 1)->pause(1000)
                ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:last-child'))
                ->type('agronomic_date', $this->makeAgronomicHarvest()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicHarvest()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicHarvest()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicHarvest()->agronomic_observations)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_harvests', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'agronomic_date'            => date_to_db($this->makeAgronomicHarvest()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicHarvest()->agronomic_quantity,
            'agronomic_quantity_unit'   => $this->makeAgronomicHarvest()->agronomic_quantity_unit,
            'agronomic_observations'    => $this->makeAgronomicHarvest()->agronomic_observations,
        ]);
    }

    public function test_admin_can_create_AgronomicHarvests()
    {
        $this->browse(function (Browser $browser) {
                    $browser->loginAs($god = $this->createGod())
                        ->visit($this->pathToList)
                        ->click('#button-config')
                        ->click('#button-create-link')
                        ->assertPathIs($this->pathToCreate)
                        ->select('client_id', 2)->pause(1000)
                        ->select('user_id', $this->getValueFromSelector($browser, $selector = '#user_id option:last-child'))->pause(1000)
                        ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:last-child'))
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
                        ->press(trans('buttons.new'))
                        ->assertSee(__('The item has been create successfuly'));
                });

                $this->assertDatabaseHas('agronomic_harvests', [
                    'client_id'                 => 2,
                    'agronomic_date'            => date_to_db($this->makeAgronomicHarvest()->agronomic_date),
                    'agronomic_quantity'        => $this->makeAgronomicHarvest()->agronomic_quantity,
                    'agronomic_quantity_unit'   => $this->makeAgronomicHarvest()->agronomic_quantity_unit,
                    'agronomic_observations'    => $this->makeAgronomicHarvest()->agronomic_observations,
                    'agronomic_ph'                      => 1,
                    'agronomic_baume'                   => 10,
                    'agronomic_acidity'                 => 20,
                    'agronomic_poliphenol'              => 30,
                    'agronomic_anthocyanin_total'       => 40,
                    'agronomic_anthocyanin_removable'   => 50,
                ]);
    }

    public function test_editor_can_create_AgronomicHarvests()
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

    public function test_user_can_create_AgronomicHarvests()
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
