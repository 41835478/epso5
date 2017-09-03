<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;

class CropsCreateTest extends DuskTestCase
{
    use CropHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/crops/create';
    protected $pathToList   = '/dashboard/crops';

    /*
    |--------------------------------------------------------------------------
    | Add Crops
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_crop()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createAdmin())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('crop_name', $this->makeCrop()->crop_name)
                ->type('crop_module', $this->makeCrop()->crop_module)
                ->type('crop_description', $this->makeCrop()->crop_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_a_crop()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_crop()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_crop()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
