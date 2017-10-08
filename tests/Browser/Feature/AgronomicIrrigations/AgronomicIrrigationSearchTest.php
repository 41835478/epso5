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
    public function test_agronomicirrigation_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_crop', $this->firstCrop()->crop_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->firstCrop()->crop_name);
                    $table->assertDontSee($this->secondCrop()->crop_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', $this->lastAgronomicIrrigation()->client->client_name)
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
                    $table->assertSee(parent::reduceText($this->lastAgronomicIrrigation()->user->name));
                    $table->assertDontSee(parent::reduceText($this->notThisClientAgronomicIrrigation($clientId)->user->name));
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicIrrigation()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(parent::reduceText($this->lastAgronomicIrrigation()->plot->plot_name));
                    $table->assertDontSee(parent::reduceText($this->firstAgronomicIrrigation()->plot->plot_name));
                });
        });
    }
}