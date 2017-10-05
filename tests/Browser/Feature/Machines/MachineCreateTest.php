<?php

namespace Tests\Browser\Tests\Machines;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\MachineHelpers;

class MachineCreateTest extends DuskTestCase
{
    use MachineHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/machines/create';
    protected $pathToList   = '/dashboard/machines';


    /*
    |--------------------------------------------------------------------------
    | Add Machine
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_machine()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', 1)->pause(500)
                ->select('user_id', 1)
                ->type('machine_equipment_name', $this->makeMachine()->machine_equipment_name)
                ->type('machine_brand', $this->makeMachine()->machine_brand)
                ->type('machine_model', $this->makeMachine()->machine_model)
                ->type('machine_date', $this->makeMachine()->machine_date)
                ->type('machine_inspection', $this->makeMachine()->machine_inspection)
                ->select('machine_next_inspection', $this->makeMachine()->machine_next_inspection)
                ->type('machine_observations', $this->makeMachine()->machine_observations)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('machines', [
            'machine_equipment_name'        => $this->makeMachine()->machine_equipment_name,
            'machine_brand'                 => $this->makeMachine()->machine_brand,
            'machine_model'                 => $this->makeMachine()->machine_model,
            'machine_date'                  => date_to_db($this->makeMachine()->machine_date),
            'machine_inspection'            => date_to_db($this->makeMachine()->machine_inspection),
            'machine_next_inspection'       => $this->makeMachine()->machine_next_inspection,
            'machine_observations'          => $this->makeMachine()->machine_observations,
        ]);
    }

    public function test_admin_can_create_machine()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_machine()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_user_cant_create_machine()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }
}
