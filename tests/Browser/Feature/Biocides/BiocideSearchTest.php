<?php

namespace Tests\Browser\Tests\Biocides;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\BiocideHelpers;

class BiocideSearchTest extends DuskTestCase
{
    use BiocideHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_biocide_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/biocides')
                ->type('search_register', $this->lastBiocide()->biocide_num)
                ->waitForText($this->lastBiocide()->biocide_num)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastBiocide()->biocide_num);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_biocide', $this->lastBiocide()->biocide_name)
                ->waitForText($this->lastBiocide()->biocide_name)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastBiocide()->biocide_num);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_company', $this->lastBiocide()->biocide_company)
                ->waitForText($this->lastBiocide()->biocide_company)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastBiocide()->biocide_num);
                });
        });
    }
}
