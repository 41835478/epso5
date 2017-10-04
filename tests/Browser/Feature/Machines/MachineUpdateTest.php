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
    
    protected $route = 'dashboard.admin.machines.edit';

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
                ->type('machine_name', $this->makeMachine()->machine_name)
                // ->type('machine_description', $this->makeMachine()->machine_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('machines', [
            'machine_name'           => $this->makeMachine()->machine_name,
            // 'machine_description'    => $this->makeMachine()->machine_description,
        ]);
    }
}
