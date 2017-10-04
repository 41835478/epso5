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
                ->type('search_name', $this->lastMachine()->machine_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastMachine()->machine_name);
                    $table->assertDontSee($this->firstMachine()->machine_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastMachine()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastMachine()->machine_name);
                    $table->assertDontSee($this->firstMachine()->machine_name);
                });
        });
    }
}