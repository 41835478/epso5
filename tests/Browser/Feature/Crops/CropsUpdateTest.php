<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;

class CropsUpdateTest extends DuskTestCase
{
    use CropHelpers;

    protected $route = 'dashboard.admin.crops.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_crop()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastCrop()->id)
                ->type('crop_name', $this->makeCrop()->crop_name)
                ->type('crop_module', $this->makeCrop()->crop_module)
                ->type('crop_description', $this->makeCrop()->crop_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('crops', [
            'crop_name'         => $this->makeCrop()->crop_name,
            'crop_module'       => $this->makeCrop()->crop_module,
            'crop_description'  => $this->makeCrop()->crop_description,
        ]);
    }
}
