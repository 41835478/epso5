<?php

namespace Tests\Browser\Tests\Configs;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ConfigHelpers;

class ConfigUpdateTest extends DuskTestCase
{
    use ConfigHelpers;
    
    protected $route = 'dashboard.admin.configs.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_config_field()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastConfig()->id)
                ->type('config_name', $this->makeConfig()->config_name)
                ->type('config_description', $this->makeConfig()->config_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('configs', [
            'config_name'           => $this->makeConfig()->config_name,
            'config_description'    => $this->makeConfig()->config_description,
        ]);
    }
}
