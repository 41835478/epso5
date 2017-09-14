<?php

namespace Tests\Browser\Tests\CropVarieties;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;
use Tests\Helpers\CropVarietyHelpers;

class CropVarietySearchTest extends DuskTestCase
{
    use CropHelpers, CropVarietyHelpers;
    
    protected $crop = 1;
    protected $type = ['Blanco', 'Tinto'];
    protected $path = '/dashboard/crop_varieties/';

    /*
    |--------------------------------------------------------------------------
    | Search crop_varieties
    |--------------------------------------------------------------------------
    */
    public function test_cropvariety_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path . $this->crop)
                ->type('search_variety', $this->lastCropVariety($this->crop)->crop_variety_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastCropVariety($this->crop)->crop_variety_name);
                    $table->assertDontSee($this->firstCropVariety($this->crop)->crop_variety_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_type', $this->type[0])
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->type[0]);
                    $table->assertDontSee($this->type[1]);
                });
        });
    }
}