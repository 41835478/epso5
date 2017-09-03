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
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastCrop()->crop_name);
                });
        });
    }
}
