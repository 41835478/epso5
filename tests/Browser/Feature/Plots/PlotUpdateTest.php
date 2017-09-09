<?php

namespace Tests\Browser\Tests\Plots;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\PlotHelpers;

class PlotUpdateTest extends DuskTestCase
{
    use PlotHelpers;
    
    protected $route = 'dashboard.user.plots.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastPlot()->id)
                ->type('plot_name', $this->makePlot()->plot_name)
                // ->type('plot_description', $this->makePlot()->plot_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('plots', [
            'plot_name'           => $this->makePlot()->plot_name,
            // 'plot_description'    => $this->makePlot()->plot_description,
        ]);
    }
}
