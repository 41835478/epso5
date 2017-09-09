<?php

namespace Tests\Browser\Tests\Configs;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ConfigHelpers;

class ConfigSearchTest extends DuskTestCase
{
    use ConfigHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_config_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/configs')
                ->type('search_config', $this->lastConfig()->config_name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastConfig()->config_description);
                    $table->assertDontSee($this->firstConfig()->config_description);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastConfig()->id)
                ->pause(1000)           
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastConfig()->config_name);
                    $table->assertDontSee($this->firstConfig()->config_description);
                });
        });
    }
}
