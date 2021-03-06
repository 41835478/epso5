<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ClientHelpers;

class ClientCreateTest extends DuskTestCase
{
    use ClientHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/clients/create';
    protected $pathToList   = '/dashboard/clients';


    /*
    |--------------------------------------------------------------------------
    | Add clients
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('client_name', $this->makeClient()->client_name)
                ->type('client_email', $this->makeClient()->client_email)
                ->type('client_nif', $this->makeClient()->client_nif)
                ->type('client_zip', $this->makeClient()->client_zip)
                ->type('client_contact', $this->makeClient()->client_contact)
                ->type('client_address', $this->makeClient()->client_address)
                ->type('client_city', $this->makeClient()->client_city)
                ->type('client_region', $this->makeClient()->client_region)
                ->type('client_state', $this->makeClient()->client_state)
                ->type('client_country', $this->makeClient()->client_country)
                ->driver->executeScript('window.scrollTo(0, 800);');

            $browser
                ->check('#checkbox-region-' . $this->makeRegion())
                ->check('#checkbox-crop-1')
                ->check('#checkbox-training-1')
                ->check('#checkbox-irrigation-1')
                ->check('#checkbox-irrigation-3')
                ->check('#checkbox-config-1')
                ->check('#checkbox-config-2');

            $browser
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
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
            'irrigation_id'     => 1,
        ]);

        $this->assertDatabaseHas('client_irrigation', 
        [
            'client_id'         => $this->lastClient()->id,
            'irrigation_id'     => 3,
        ]);

        $this->assertDatabaseMissing('client_irrigation', 
        [
            'client_id'         => $this->lastClient()->id,
            'irrigation_id'     => 2,
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

        $this->assertDatabaseHas('client_config', 
        [
            'client_id'     => $this->lastClient()->id,
            'config_id'     => 2,
        ]);


        $this->assertDatabaseMissing('client_config', 
        [
            'client_id'     => $this->lastClient()->id,
            'config_id'     => 3,
        ]);
    }

    public function test_admin_can_create_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
