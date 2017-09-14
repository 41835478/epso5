<?php

namespace Tests\Browser\Tests\CropVarieties;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropVarietyHelpers;

class CropVarietySearchTest extends DuskTestCase
{
    use CropVarietyHelpers;
    
    protected $path = '/dashboard/crop_varieties';

    /*
    |--------------------------------------------------------------------------
    | Search crop_varieties
    |--------------------------------------------------------------------------
    */
    public function test_cropvariety_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_name', $this->lastCropVariety()->cropvariety_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastCropVariety()->cropvariety_name);
                    $table->assertDontSee($this->firstCropVariety()->cropvariety_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastCropVariety()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastCropVariety()->cropvariety_name);
                    $table->assertDontSee($this->firstCropVariety()->cropvariety_name);
                });
        });
    }
}