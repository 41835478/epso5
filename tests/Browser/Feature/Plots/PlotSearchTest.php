<?php

namespace Tests\Browser\Tests\Plots;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\PlotHelpers;

class PlotSearchTest extends DuskTestCase
{
    use PlotHelpers;
    
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
                ->type('search_name', $this->lastPlot()->plot_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastPlot()->plot_name);
                    $table->assertDontSee($this->firstPlot()->plot_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastPlot()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastPlot()->plot_name);
                    $table->assertDontSee($this->firstPlot()->plot_name);
                });
        });
    }
}