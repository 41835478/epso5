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
                ->assertMissing('#client_id')
                ->select('user_id', $this->makePlot()->user_id)
                ->type('plot_name', $this->makePlot()->plot_name)
                ->type('plot_framework', $this->makePlot()->plot_framework)
                ->type('plot_area', $this->makePlot()->plot_area)
                ->type('plot_percent_cultivated_land', $this->makePlot()->plot_percent_cultivated_land)
                ->type('plot_start_date', $this->makePlot()->plot_start_date)
                ->select('crop_variety_id', $this->makePlot()->crop_variety_id)
                ->select('pattern_id', $this->makePlot()->pattern_id)
                ->type('crop_quantity', $this->makePlot()->crop_quantity)
                ->select('crop_training', 2)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('plots', [
            'plot_name'                     => $this->makePlot()->plot_name,
            'plot_framework'                => $this->framework($this->makePlot()->plot_framework),
            'plot_area'                     => $this->makePlot()->plot_area,
            'plot_real_area'                => (($this->makePlot()->plot_area / 100) * $this->makePlot()->plot_percent_cultivated_land),
            'plot_percent_cultivated_land'  => $this->makePlot()->plot_percent_cultivated_land,
            'plot_start_date'               => date_to_db($this->makePlot()->plot_start_date),
            'crop_variety_id'               => $this->makePlot()->crop_variety_id,
            'pattern_id'                    => $this->makePlot()->pattern_id,
            'crop_quantity'                 => $this->makePlot()->crop_quantity,
            'crop_training'                 => 2,
        ]);
    }
}
