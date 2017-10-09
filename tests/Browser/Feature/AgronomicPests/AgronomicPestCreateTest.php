<?php

namespace Tests\Browser\Tests\AgronomicPests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicPestHelpers;

class AgronomicPestCreateTest extends DuskTestCase
{
    use AgronomicPestHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_pests/create';
    protected $pathToList   = '/dashboard/agronomic_pests';


    /*
    |--------------------------------------------------------------------------
    | Add AgronomicPest
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_AgronomicPests()
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
                ->type('agronomic_date', $this->makeAgronomicPest()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicPest()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicPest()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicPest()->agronomic_observations)
                // ->type('agronomicpest_name', $this->makeAgronomicPest()->agronomicpest_name)
                // ->type('agronomicpest_description', $this->makeAgronomicPest()->agronomicpest_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_pests', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'agronomic_date'            => date_to_db($this->makeAgronomicPest()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicPest()->agronomic_quantity,
            'agronomic_quantity_unit'   => $this->makeAgronomicPest()->agronomic_quantity_unit,
            'agronomic_observations'    => $this->makeAgronomicPest()->agronomic_observations,
        ]);
    }

    public function test_admin_can_create_AgronomicPests()
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

    public function test_editor_can_create_AgronomicPests()
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

    public function test_user_can_create_AgronomicPests()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('#client_id')
                ->assertMissing('#user_id')
                ->assertVisible('#plot_id');
        });
    }
}
