<?php

namespace Tests\Browser\Tests\Machines;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\MachineHelpers;

class MachineUpdateTest extends DuskTestCase
{
    use MachineHelpers;
    
    protected $route = 'dashboard.user.machines.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_machine()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastMachine()->id)
                ->type('machine_equipment_name', $this->makeMachine()->machine_equipment_name)
                ->type('machine_brand', $this->makeMachine()->machine_brand)
                ->type('machine_model', $this->makeMachine()->machine_model)
                ->type('machine_date', $this->makeMachine()->machine_date)
                ->type('machine_inspection', $this->makeMachine()->machine_inspection)
                ->select('machine_next_inspection', $this->makeMachine()->machine_next_inspection)
                ->type('machine_observations', $this->makeMachine()->machine_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
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

    public function test_user_cant_update_a_machine_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastMachine()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
