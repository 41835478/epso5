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
    
    protected $route        = 'dashboard.user.plots.edit';
    protected $dashboard    = '/dashboard';

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
                ->select('crop_training', $this->makePlot()->crop_training)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'))
                ->assertDontSee(__('Your are not authorized to access this section'));
        });

        $this->assertDatabaseHas('plots', [
            'plot_name'                     => $this->makePlot()->plot_name,
            'plot_framework'                => $this->framework($this->makePlot()->plot_framework),
            'plot_area'                     => $this->makePlot()->plot_area,
            'plot_real_area'                => $this->area($this->makePlot()),
            'plot_percent_cultivated_land'  => $this->makePlot()->plot_percent_cultivated_land,
            'plot_start_date'               => date_to_db($this->makePlot()->plot_start_date),
            'crop_variety_id'               => $this->makePlot()->crop_variety_id,
            'pattern_id'                    => $this->makePlot()->pattern_id,
            'crop_quantity'                 => $this->makePlot()->crop_quantity,
        ]);
    }

    public function test_editor_can_update_a_plot()
    {
        $plot = $this->whereClientIs($this->createEditor());

        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($editor = $this->createEditor())
                ->visitRoute($this->route, $plot->id)
                ->assertMissing('#client_id')
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'))
                ->assertDontSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_editor_cant_update_a_plot_fron_other_client()
    {
        $plot = $this->whereClientIsNot($this->createEditor());

        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($editor = $this->createEditor())
                ->visitRoute($this->route, $plot->id)
                ->assertPathIs($this->dashboard);
        });
    }

    public function test_user_can_update_a_plot()
    {
        $plot = $this->whereUserIs($this->createUserBase());

        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $plot->id)
                ->assertMissing('#client_id')
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'))
                ->assertDontSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_update_a_plot_from_other_user()
    {
        $plot = $this->whereUserIsNot($this->createUserBase());

        $this->browse(function (Browser $browser) use ($plot) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $plot->id)
                ->assertPathIs($this->dashboard);
        });
    }
}
