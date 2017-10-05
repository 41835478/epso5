<?php

namespace Tests\Browser\Tests\Machines;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\MachineHelpers;

class MachineSearchTest extends DuskTestCase
{
    use MachineHelpers;
    
    protected $path = '/dashboard/machines';

    /*
    |--------------------------------------------------------------------------
    | Search machines
    |--------------------------------------------------------------------------
    */
    public function test_machine_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_machine', $this->lastMachine()->machine_equipment_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastMachine()->machine_equipment_name);
                    $table->assertDontSee($this->firstMachine()->machine_equipment_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_brand', $this->lastMachine()->machine_brand)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastMachine()->machine_brand);
                    $table->assertDontSee($this->firstMachine()->machine_brand);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_model', $this->lastMachine()->machine_model)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastMachine()->machine_model);
                    $table->assertDontSee($this->firstMachine()->machine_model);
                });
        });
    }
}