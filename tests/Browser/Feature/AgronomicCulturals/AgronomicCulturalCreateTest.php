<?php

namespace Tests\Browser\Tests\AgronomicCulturals;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicCulturalHelpers;

class AgronomicCulturalCreateTest extends DuskTestCase
{
    use AgronomicCulturalHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_culturals/create';
    protected $pathToList   = '/dashboard/agronomic_culturals';


    /*
    |--------------------------------------------------------------------------
    | Add AgronomicCultural
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_AgronomicCulturals()
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
                ->type('agronomic_date', $this->makeAgronomicCultural()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicCultural()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicCultural()->agronomic_quantity_unit)
                ->type('agronomic_observations', $this->makeAgronomicCultural()->agronomic_observations)
                // ->type('agronomiccultural_name', $this->makeAgronomicCultural()->agronomiccultural_name)
                // ->type('agronomiccultural_description', $this->makeAgronomicCultural()->agronomiccultural_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_culturals', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'agronomic_date'            => date_to_db($this->makeAgronomicCultural()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicCultural()->agronomic_quantity,
            'agronomic_quantity_unit'   => $this->makeAgronomicCultural()->agronomic_quantity_unit,
            'agronomic_observations'    => $this->makeAgronomicCultural()->agronomic_observations,
        ]);
    }

    public function test_admin_can_create_AgronomicCulturals()
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

    public function test_editor_can_create_AgronomicCulturals()
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

    public function test_user_can_create_AgronomicCulturals()
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
