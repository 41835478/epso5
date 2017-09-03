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
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
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
