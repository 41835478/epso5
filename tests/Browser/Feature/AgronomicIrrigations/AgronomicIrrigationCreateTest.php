<?php

namespace Tests\Browser\Tests\AgronomicIrrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIrrigationHelpers;

class AgronomicIrrigationCreateTest extends DuskTestCase
{
    use AgronomicIrrigationHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_irrigations/create';
    protected $pathToList   = '/dashboard/agronomic_irrigations';


    /*
    |--------------------------------------------------------------------------
    | Add AgronomicIrrigation
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_agronomicirrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                // ->type('agronomicirrigation_name', $this->makeAgronomicIrrigation()->agronomicirrigation_name)
                // ->type('agronomicirrigation_description', $this->makeAgronomicIrrigation()->agronomicirrigation_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_irrigations', [
            'agronomicirrigation_name'           => $this->makeMachine()->agronomicirrigation_name,
            // 'agronomicirrigation_description'    => $this->makeMachine()->agronomicirrigation_description,
        ]);
    }

    public function test_admin_can_create_agronomicirrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_agronomicirrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_agronomicirrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
