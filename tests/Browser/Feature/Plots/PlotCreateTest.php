<?php

namespace Tests\Browser\Tests\Plots;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\PlotHelpers;

class PlotCreateTest extends DuskTestCase
{
    use PlotHelpers;

    protected $dashboard        = '/dashboard';
    protected $pathToCreate     = '/dashboard/plots/create';
    protected $pathToCreateTest = '/dashboard/plots/test';
    protected $pathToList       = '/dashboard/plots';
    protected $region           = 3; //Alicante
    protected $city             = 'Castell de Castells';

    /*
    |--------------------------------------------------------------------------
    | Add Plot
    |--------------------------------------------------------------------------
    */
    public function test_god_can_create_a_plot()
    {
        $button = icon('world', trans('geolocations.new.add'));

        $this->browse(function (Browser $browser) use ($button) {
            //Step 1: geolocate a plot
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->select('region_id', $this->region)
                ->type('city_name', substr($this->city, 0, 5))
                ->pause(1000)
                ->with('.autocomplete-suggestion', function ($table) {
                    $table->assertSee($this->city);
                })
                ->click("[data-title='{$this->city}']")
                ->waitFor('#searchButton')
                ->press('#searchButton')
                ->click('.leaflet-control-zoom-in')->pause(500)
                ->click('.leaflet-control-zoom-in')->pause(500)
                ->click('.leaflet-control-zoom-in')->pause(500)
                ->click('#map')
                ->press('#button-create-submit');
                //Step 2: create a plot
                $browser
                ->assertMissing('#plot_crop_type')
                ->assertMissing('#crop_variety_id')
                ->assertMissing('#pattern_id')
                ->assertMissing('#plot_quantity')
                ->assertMissing('#crop_training')
                //Administration
                ->select('client_id', 1)->pause(500)
                ->select('user_id', 1)
                //Plot
                ->type('plot_name', $this->makePlot()->plot_name)
                ->type('plot_framework', $this->makePlot()->plot_framework)
                ->type('plot_area', $this->makePlot()->plot_area)
                ->type('plot_percent_cultivated_land', $this->makePlot()->plot_percent_cultivated_land)
                ->type('plot_start_date', $this->makePlot()->plot_start_date)
                ->select('crop_variety_id', 1)
                ->select('pattern_id', 1)
                ->type('crop_quantity', $this->makePlot()->crop_quantity)
                ->select('crop_training', 1)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('plots', [
            'plot_name'                     => $this->makePlot()->plot_name,
            'plot_framework'                => $this->makePlot()->plot_framework,
            'plot_area'                     => number_format($this->makePlot()->plot_area, 2, '.', ''),
            'plot_real_area'                => $this->area($this->makePlot()),
            'plot_percent_cultivated_land'  => $this->makePlot()->plot_percent_cultivated_land,
            'plot_start_date'               => date_to_db($this->makePlot()->plot_start_date),
            'crop_variety_id'               => 1,
            'pattern_id'                    => 1,
            'crop_quantity'                 => $this->makePlot()->crop_quantity,
        ]);
    }

    public function test_admin_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreateTest)
                ->assertPathIs($this->pathToCreateTest)
                ->assertMissing('#plot_crop_type')
                ->assertMissing('#crop_variety_id')
                ->assertMissing('#pattern_id')
                ->assertMissing('#crop_quantity')
                ->assertMissing('#crop_training')
                ->assertVisible('#client_id')
                ->assertVisible('#user_id');
        });
    }

    public function test_editor_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
            ->visit($this->pathToCreateTest)
            ->assertPathIs($this->pathToCreateTest)
            ->assertMissing('#plot_crop_type')
            ->assertMissing('#client_id')
            ->assertVisible('#crop_variety_id')
            ->assertVisible('#pattern_id')
            ->assertVisible('#crop_quantity')
            ->assertVisible('#crop_training')
            ->assertVisible('#user_id');
        });
    }

    public function test_user_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreateTest)
                ->assertPathIs($this->pathToCreateTest)
                ->assertMissing('#plot_crop_type')
                ->assertMissing('#client_id')
                ->assertMissing('#user_id')
                ->assertVisible('#crop_variety_id')
                ->assertVisible('#pattern_id')
                ->assertVisible('#crop_quantity')
                ->assertVisible('#crop_training');
        });
    }
}
