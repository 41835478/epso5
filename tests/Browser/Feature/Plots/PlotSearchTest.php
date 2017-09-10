<?php

namespace Tests\Browser\Tests\Plots;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ClientHelpers;
use Tests\Helpers\CropHelpers;
use Tests\Helpers\PlotHelpers;
use Tests\Helpers\UserHelpers;

class PlotSearchTest extends DuskTestCase
{
    use ClientHelpers, CropHelpers, PlotHelpers, UserHelpers;
    
    protected $path = '/dashboard/plots';

    /*
    |--------------------------------------------------------------------------
    | Search plots
    |--------------------------------------------------------------------------
    */
    public function test_plot_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_client', $this->createClientValencia()->client_name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createClientValencia()->client_name);
                    $table->assertDontSee($this->createClientEpso()->client_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_crop', $this->firstCrop()->crop_name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->firstCrop()->crop_name);
                    $table->assertDontSee($this->secondCrop()->crop_name);
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', $this->createAdmin()->name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createAdmin()->name);
                    $table->assertDontSee($this->createUser()->name);
                });
        });
    }
}