<?php

namespace Tests\Browser\Tests\Cities;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CityHelpers;

class CitySearchTest extends DuskTestCase
{
    use CityHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_city_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/cities')
                ->type('search_country', $this->setLocalizationByName('country'))
                ->waitForText($this->setLocalizationByName('country'))
                ->with('.table', function ($table) {
                    $table->assertSee($this->setLocalizationByName('country'));
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_state', $this->setLocalizationByName('state'))
                ->waitForText($this->setLocalizationByName('state'))
                ->with('.table', function ($table) {
                    $table->assertSee($this->setLocalizationByName('state'));
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_city', $this->setLocalizationByName('city'))
                ->waitForText($this->setLocalizationByName('city'))
                ->with('.table', function ($table) {
                    $table->assertSee($this->setLocalizationByName('city'));
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_region', $this->setLocalizationByName('region'))
                ->waitForText($this->setLocalizationByName('region'))
                ->with('.table', function ($table) {
                    $table->assertSee($this->setLocalizationByName('region'));
                });
        });
    }
}
