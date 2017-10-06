<?php

namespace Tests\Browser\Tests\Plots;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CityHelpers;
use Tests\Helpers\ClientHelpers;
use Tests\Helpers\CropHelpers;
use Tests\Helpers\PlotHelpers;
use Tests\Helpers\UserHelpers;
use Tests\Helpers\VarietyHelpers;

class PlotSearchTest extends DuskTestCase
{
    use CityHelpers, ClientHelpers, CropHelpers, PlotHelpers, UserHelpers, VarietyHelpers;
    
    protected $path = '/dashboard/plots';

    /*
    |--------------------------------------------------------------------------
    | Search plots
    |--------------------------------------------------------------------------
    */
    public function test_god_plot_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_client', typeText($this->createClientValencia()->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createClientValencia()->client_name);
                    $table->assertDontSee($this->createClientEpso()->client_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_crop', typeText($this->firstCrop()->crop_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->firstCrop()->crop_name);
                    $table->assertDontSee($this->secondCrop()->crop_name);
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', typeText($this->createAdmin()->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createAdmin()->name);
                    $table->assertDontSee($this->createUser()->name);
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', typeText($this->firstPlot()->plot_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->firstPlot()->plot_name);
                    $table->assertDontSee($this->lastPlot()->plot_name);
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_variety', $this->lastVariety('name'))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastVariety('name'));
                    $table->assertDontSee($this->firstVariety('name'));
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_city', typeText($this->lastCityFromPlot('name')))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastCityFromPlot('name'));
                    $table->assertDontSee($this->firstCityFromPlot('name'));
                });
        });
    }

    public function test_editor_plot_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path)
                ->assertMissing('search_client')
                ->assertMissing('search_crop')
                ->type('search_user', typeText($this->createAdmin()->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createAdmin()->name);
                    $table->assertDontSee($this->createUser()->name);
                });
        });
    }

    public function test_user_plot_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->path)
                ->assertMissing('search_client')
                ->assertMissing('search_crop')
                ->assertMissing('search_user');
        });
    }
}