<?php

namespace Tests\Browser\Tests\CropVarieties;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;
use Tests\Helpers\CropVarietyHelpers;

class CropVarietyCreateTest extends DuskTestCase
{
    use CropHelpers, CropVarietyHelpers;

    protected $dashboard        = '/dashboard';
    protected $pathToCreate     = '/dashboard/crop_varieties/create?crop=';
    protected $pathToCreateAlt  = '/dashboard/crop_varieties/create';
    protected $pathToList       = '/dashboard/crop_varieties/';


    /*
    |--------------------------------------------------------------------------
    | Add CropVariety
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_cropvariety()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList . $this->makeCropVariety()->crop_id)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreateAlt)
                ->assertInputValue('crop_id', $this->makeCropVariety()->crop_id)
                ->type('crop_variety_name', $this->makeCropVariety()->crop_variety_name);

            if($this->makeCropVariety->crop_id == 1) {
                $browser->select('crop_variety_type', $this->makeCropVariety()->crop_variety_type);
            } 
            
            $browser->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_cropvariety()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_cropvariety()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_cropvariety()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
