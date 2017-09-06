<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;

class CropsModalTest extends DuskTestCase
{
    use CropHelpers;


    /*
    |--------------------------------------------------------------------------
    | Search Crops
    |--------------------------------------------------------------------------
    */
    public function test_crop_modal()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/crops')
                ->click('.button-crop_type-click')
                ->waitFor('#modal-crop-variety-types');
        });
    }
}
