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
                $browser;
        });
    }

    // public function test_god_can_create_a_plot()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs($god = $this->createGod())
    //             ->visit($this->pathToList)
    //             ->click('#button-config')
    //             ->click('#button-create-link')
    //             ->assertPathIs($this->pathToCreate)
    //             ->assertMissing('plot_crop_type')
    //             ->assertMissing('crop_variety_id')
    //             ->assertMissing('pattern_id')
    //             ->assertMissing('plot_quantity')
    //             ->assertMissing('crop_training')
    //             ->select('client_id', 1)
    //             ->select('user_id', 1)
    //             ->pause(500)
    //             ->select('plot_crop_type', 1)
    //             ->pause(500)
    //             ->select('crop_variety_id', 1)
    //             ->select('pattern_id', 1)
    //             ->type('plot_quantity', 1000)
    //             ->select('crop_training', 1);
    //             // ->type('plot_name', $this->makePlot()->plot_name)
    //             // ->type('plot_description', $this->makePlot()->plot_description)
    //             // ->press(trans('buttons.new'))
    //             // ->assertSee(__('The item has been create successfuly'));
    //     });
    //}

    public function test_admin_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_user_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }
}
