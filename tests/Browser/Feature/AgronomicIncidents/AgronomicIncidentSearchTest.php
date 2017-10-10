<?php

namespace Tests\Browser\Tests\AgronomicIncidents;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIncidentHelpers;

class AgronomicIncidentSearchTest extends DuskTestCase
{
    use AgronomicIncidentHelpers;
    
    protected $path = '/dashboard/agronomic_incidents';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_incidents
    |--------------------------------------------------------------------------
    */
    public function test_AgronomicIncidents_god_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', parent::reduceText($this->lastAgronomicIncident()->client->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicIncident()->client_id;
                    $table->assertSee($this->lastAgronomicIncident()->client->client_name);
                    $table->assertDontSee($this->notThisClientAgronomicIncident($clientId)->client->client_name);
                });
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicIncident()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicIncident()->client_id;
                    $table->assertSee($this->lastAgronomicIncident()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicIncident($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicIncident()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(parent::reduceText($this->lastAgronomicIncident()->plot->plot_name));
                    $table->assertDontSee(parent::reduceText($this->firstAgronomicIncident()->plot->plot_name));
                });
        });
    }

    public function test_AgronomicIncidents_editor_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path);
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicIncident()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicIncident()->client_id;
                    $table->assertSee($this->lastAgronomicIncident()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicIncident($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicIncident()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(parent::reduceText($this->lastAgronomicIncident()->plot->plot_name));
                    $table->assertDontSee(parent::reduceText($this->firstAgronomicIncident()->plot->plot_name));
                });
        });
    }

    public function test_AgronomicIncidents_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->userAgronomicIncident($this->createUserBase()->id)->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->userAgronomicIncident($this->createUserBase()->id)->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicIncident()->plot->plot_name);
                });
        });
    }
}