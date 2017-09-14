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
                ->visitRoute($this->route, [$this->lastCropVariety()->id, $this->lastCropVariety()->crop_id])
                ->type('crop_variety_name', $this->makeCropVariety()->crop_variety_name);

                if($this->makeCropVariety->crop_id == 1) {
                    $browser->select('crop_variety_type', $this->makeCropVariety()->crop_variety_type);
                } 

                $browser->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('crop_varieties', [
            'crop_variety_name' => $this->makeCropVariety()->crop_variety_name,
        ]);

        if($this->makeCropVariety->crop_id == 1) {
            $this->assertDatabaseHas('crop_varieties', [
                'crop_variety_type' => $this->makeCropVariety()->crop_variety_type,
            ]);
        } 
    }
}
