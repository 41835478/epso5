<?php

namespace Tests\Browser\Tests\AgronomicIrrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIrrigationHelpers;

class AgronomicIrrigationSearchTest extends DuskTestCase
{
    use AgronomicIrrigationHelpers;
    
    protected $path = '/dashboard/agronomic_irrigations';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_irrigations
    |--------------------------------------------------------------------------
    */
    public function test_agronomicirrigation_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_name', $this->lastAgronomicIrrigation()->agronomicirrigation_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicIrrigation()->agronomicirrigation_name);
                    $table->assertDontSee($this->firstAgronomicIrrigation()->agronomicirrigation_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastAgronomicIrrigation()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicIrrigation()->agronomicirrigation_name);
                    $table->assertDontSee($this->firstAgronomicIrrigation()->agronomicirrigation_name);
                });
        });
    }
}