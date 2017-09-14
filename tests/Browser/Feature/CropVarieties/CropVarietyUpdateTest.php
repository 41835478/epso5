<?php

namespace Tests\Browser\Tests\CropVarieties;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropVarietyHelpers;

class CropVarietyUpdateTest extends DuskTestCase
{
    use CropVarietyHelpers;
    
    protected $route = 'dashboard.admin.crop_varieties.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_cropvariety()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastCropVariety()->id)
                ->type('cropvariety_name', $this->makeCropVariety()->cropvariety_name)
                // ->type('cropvariety_description', $this->makeCropVariety()->cropvariety_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('crop_varieties', [
            'cropvariety_name'           => $this->makeCropVariety()->cropvariety_name,
            // 'cropvariety_description'    => $this->makeCropVariety()->cropvariety_description,
        ]);
    }
}
