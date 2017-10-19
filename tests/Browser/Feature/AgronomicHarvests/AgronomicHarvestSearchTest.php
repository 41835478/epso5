<?php

namespace Tests\Browser\Tests\AgronomicHarvests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicHarvestHelpers;

class AgronomicHarvestSearchTest extends DuskTestCase
{
    use AgronomicHarvestHelpers;
    
    protected $path = '/dashboard/agronomic_harvests';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_harvests
    |--------------------------------------------------------------------------
    */
    public function test_AgronomicHarvests_god_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', parent::reduceText($this->lastAgronomicHarvest()->client->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicHarvest()->client_id;
                    $table->assertSee($this->lastAgronomicHarvest()->client->client_name);
                    $table->assertDontSee($this->notThisClientAgronomicHarvest($clientId)->client->client_name);
                });
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicHarvest()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicHarvest()->client_id;
                    $table->assertSee($this->lastAgronomicHarvest()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicHarvest($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicHarvest()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicHarvest()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicHarvest()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicHarvests_editor_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path);
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicHarvest()->user->name))->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicHarvest()->client_id;
                    $table->assertSee($this->lastAgronomicHarvest()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicHarvest($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicHarvest()->plot->plot_name))->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicHarvest()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicHarvest()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicHarvests_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->userAgronomicHarvest($this->createUserBase()->id)->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->userAgronomicHarvest($this->createUserBase()->id)->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicHarvest()->plot->plot_name);
                });
        });
    }
}