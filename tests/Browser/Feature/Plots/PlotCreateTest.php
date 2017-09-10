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

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/plots/create';
    protected $pathToList   = '/dashboard/plots';


    /*
    |--------------------------------------------------------------------------
    | Add Plot
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate);
                // ->type('plot_name', $this->makePlot()->plot_name)
                // ->type('plot_description', $this->makePlot()->plot_description)
                // ->press(trans('buttons.new'))
                // ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_user_cant_create_plot()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }
}
