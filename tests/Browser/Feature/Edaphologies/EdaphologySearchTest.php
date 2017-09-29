<?php

namespace Tests\Browser\Tests\Edaphologies;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\EdaphologyHelpers;

class EdaphologySearchTest extends DuskTestCase
{
    use EdaphologyHelpers;
    
    protected $path = '/dashboard/edaphologies';

    /*
    |--------------------------------------------------------------------------
    | Search edaphologies
    |--------------------------------------------------------------------------
    */
    public function test_edaphology_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_name', $this->lastEdaphology()->edaphology_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastEdaphology()->edaphology_name);
                    $table->assertDontSee($this->firstEdaphology()->edaphology_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastEdaphology()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastEdaphology()->edaphology_name);
                    $table->assertDontSee($this->firstEdaphology()->edaphology_name);
                });
        });
    }
}