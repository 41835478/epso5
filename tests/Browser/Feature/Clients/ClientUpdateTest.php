<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ClientHelpers;

class ClientUpdateTest extends DuskTestCase
{
    use ClientHelpers;
    
    protected $route = 'dashboard.admin.clients.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastClient()->id)
                ->type('client_name', $this->makeClient()->client_name)
                ->type('client_email', $this->makeClient()->client_email)
                ->type('client_address', $this->makeClient()->client_address)
                ->type('client_nif', $this->makeClient()->client_nif)
                ->type('client_zip', $this->makeClient()->client_zip)
                ->type('client_contact', $this->makeClient()->client_contact)
                ->type('client_city', $this->makeClient()->client_city)
                ->type('client_region', $this->makeClient()->client_region)
                ->type('client_state', $this->makeClient()->client_state)
                ->type('client_country', $this->makeClient()->client_country)
                ->driver->executeScript('window.scrollTo(0, 800);');
            
            $browser->driver->executeScript("$('input[id^=checkbox-region-]').attr('checked',false);");
            $browser->driver->executeScript("$('input[id^=checkbox-crop-]').attr('checked',false);");
            $browser->driver->executeScript("$('input[id^=checkbox-training-]').attr('checked',false);");
            $browser->driver->executeScript("$('input[id^=checkbox-irrigation-]').attr('checked',false);");
            $browser->driver->executeScript("$('input[id^=checkbox-config-]').attr('checked',false);");

            $browser
                ->check('#checkbox-region-' . $this->makeRegion())
                ->check('#checkbox-crop-1')
                ->uncheck('#checkbox-crop-2')
                ->check('#checkbox-training-1')
                ->uncheck('#checkbox-training-2')
                ->uncheck('#checkbox-irrigation-1')
                ->check('#checkbox-irrigation-2')
                ->check('#checkbox-irrigation-3')
                ->check('#checkbox-config-1')
                ->uncheck('#checkbox-config-2');

            $browser
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('clients', [
            'client_name'       => $this->makeClient()->client_name,
            'client_email'      => $this->makeClient()->client_email,
            'client_nif'        => $this->makeClient()->client_nif,
            'client_zip'        => $this->makeClient()->client_zip,
            'client_contact'    => $this->makeClient()->client_contact,
            'client_city'       => $this->makeClient()->client_city,
            'client_region'     => $this->makeClient()->client_region,
            'client_state'      => $this->makeClient()->client_state,
            'client_country'    => $this->makeClient()->client_country,
        ]);
    
        $this->assertDatabaseHas('client_region', 
        [
            'client_id'     => $this->lastClient()->id,
            'region_id'     => $this->makeRegion(),
        ]);
    
        $this->assertDatabaseMissing('client_region', 
        [
            'client_id'     => $this->lastClient()->id,
            'region_id'     => 50,
        ]);
    
        $this->assertDatabaseHas('client_crop', 
        [
            'client_id'     => $this->lastClient()->id,
            'crop_id'       => 1,
        ]);
        
        $this->assertDatabaseMissing('client_crop', 
        [
            'client_id'     => $this->lastClient()->id,
            'crop_id'       => 2,
        ]);

        $this->assertDatabaseHas('client_irrigation', 
        [
            'client_id'         => $this->lastClient()->id,
            'irrigation_id'     => 2,
        ]);

        $this->assertDatabaseHas('client_irrigation', 
        [
            'client_id'         => $this->lastClient()->id,
            'irrigation_id'     => 3,
        ]);

        $this->assertDatabaseMissing('client_irrigation', 
        [
            'client_id'         => $this->lastClient()->id,
            'irrigation_id'     => 1,
        ]);
    
        $this->assertDatabaseHas('client_training', 
        [
            'client_id'     => $this->lastClient()->id,
            'training_id'   => 1,
        ]);

        $this->assertDatabaseMissing('client_training', 
        [
            'client_id'     => $this->lastClient()->id,
            'training_id'   => 2,
        ]);

        $this->assertDatabaseHas('client_config', 
        [
            'client_id'     => $this->lastClient()->id,
            'config_id'     => 1,
        ]);

        $this->assertDatabaseMissing('client_config', 
        [
            'client_id'     => $this->lastClient()->id,
            'config_id'     => 2,
        ]);
    }
}
