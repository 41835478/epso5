<?php

namespace Tests\Browser\Tests\Clients;

use App\Repositories\Clients\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ClientHelpers;

class ClientSearchTest extends DuskTestCase
{
    use ClientHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_client_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/clients')
                ->type('search_client', $this->createClientEpso()->client_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createClientEpso()->client_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_email', $this->createClientEpso()->client_email)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createClientEpso()->client_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_contact', $this->createClientEpso()->client_contact)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createClientEpso()->client_contact);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->createClientEpso()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createClientEpso()->client_name);
                });
        });
    }
}
