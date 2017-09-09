<?php

namespace Tests\Browser\Tests\Irrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\IrrigationHelpers;

class IrrigationUpdateTest extends DuskTestCase
{
    use IrrigationHelpers;
    
    protected $route = 'dashboard.admin.irrigations.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_irrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastIrrigation()->id)
                ->type('irrigation_name', $this->makeIrrigation()->irrigation_name)
                ->type('irrigation_description', $this->makeIrrigation()->irrigation_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('irrigations', [
            'irrigation_name'           => $this->makeIrrigation()->irrigation_name,
            'irrigation_description'    => $this->makeIrrigation()->irrigation_description,
        ]);
    }
}
