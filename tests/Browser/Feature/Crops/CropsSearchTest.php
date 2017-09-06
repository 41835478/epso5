<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;

class CropsSearchTest extends DuskTestCase
{
    use CropHelpers;

    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_crop_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/crops')
                ->type('search_name', $this->lastCrop()->crop_name)
                ->waitUntilMissing($this->firstCrop()->crop_name)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastCrop()->crop_name);
                    //Not see crop type button
                    $table->assertSourceMissing('<i class="icon fa fa-pagelines" aria-hidden="true"></i>');
                });

            // $browser->click('.buttons-reset')
            //     ->pause(500)
            //     ->type('search_name', $this->firstCrop()->crop_name)
            //     ->waitForText($this->firstCrop()->crop_name)
            //     ->with('.table', function ($table) {
            //         $table->assertSee($this->firstCrop()->crop_name);
            //         //See crop type button
            //         $table->assertSourceHas('<i class="icon fa fa-pagelines" aria-hidden="true"></i>');
            //     });
        });
    }
}
