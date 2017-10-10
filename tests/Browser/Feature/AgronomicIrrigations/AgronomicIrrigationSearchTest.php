<?php

namespace Tests\Browser\Tests\AgronomicIrrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIrrigationHelpers;
use Tests\Helpers\CropHelpers;

class AgronomicIrrigationSearchTest extends DuskTestCase
{
    use AgronomicIrrigationHelpers, CropHelpers;
    
    protected $path = '/dashboard/agronomic_irrigations';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_irrigations
    |--------------------------------------------------------------------------
    */
    public function test_AgronomicIrrigations_god_search()
    {
        $this->browse(function (Browser $browser) {

            $browser->loginAs($god = $this->createGod())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', parent::reduceText($this->lastAgronomicIrrigation()->client->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicIrrigation()->client_id;
                    $table->assertSee($this->lastAgronomicIrrigation()->client->client_name);
                    $table->assertDontSee($this->notThisClientAgronomicIrrigation($clientId)->client->client_name);
                });
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicIrrigation()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicIrrigation()->client_id;
                    $table->assertSee($this->lastAgronomicIrrigation()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicIrrigation($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicIrrigation()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicIrrigation()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicIrrigation()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicIrrigations_editor_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path);
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicIrrigation()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicIrrigation()->client_id;
                    $table->assertSee($this->lastAgronomicIrrigation()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicIrrigation($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicIrrigation()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicIrrigation()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicIrrigation()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicIrrigations_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->userAgronomicIrrigation($this->createUserBase()->id)->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->userAgronomicIrrigation($this->createUserBase()->id)->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicIrrigation()->plot->plot_name);
                });
        });
    }
}