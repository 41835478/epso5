<?php

namespace Tests\Browser\Tests\Irrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\IrrigationHelpers;

class IrrigationSearchTest extends DuskTestCase
{
    use IrrigationHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_irrigation_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/irrigations')
                ->type('search_name', $this->lastIrrigation()->irrigation_name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastIrrigation()->irrigation_name);
                    $table->assertDontSee($this->firstIrrigation()->irrigation_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastIrrigation()->id)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastIrrigation()->irrigation_name);
                    $table->assertDontSee($this->firstIrrigation()->irrigation_name);
                });
        });
    }
}
