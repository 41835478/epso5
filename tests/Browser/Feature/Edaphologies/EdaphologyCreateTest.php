<?php

namespace Tests\Browser\Tests\Edaphologies;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\EdaphologyHelpers;
use Tests\Helpers\PlotHelpers;

class EdaphologyCreateTest extends DuskTestCase
{
    use EdaphologyHelpers, PlotHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/edaphologies/create/';
    protected $pathToList   = '/dashboard/edaphologies/';


    /*
    |--------------------------------------------------------------------------
    | Add Edaphology
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList . $this->firstPlot()->id)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate . $this->firstPlot()->id)
                ->select('edaphology_level', $this->makeEdaphology()->edaphology_level)
                ->type('edaphology_lat', $this->makeEdaphology()->edaphology_lat)
                ->type('edaphology_lng', $this->makeEdaphology()->edaphology_lng)
                ->type('edaphology_reference', $this->makeEdaphology()->edaphology_reference)
                ->type('edaphology_name', $this->makeEdaphology()->edaphology_name)
                ->type('edaphology_ph', $this->makeEdaphology()->edaphology_ph)
                ->type('edaphology_aggregate_stability', $this->makeEdaphology()->edaphology_aggregate_stability)
                ->type('edaphology_calcium_carbonate_equivalent', $this->makeEdaphology()->edaphology_calcium_carbonate_equivalent)
                ->type('edaphology_active_lime', $this->makeEdaphology()->edaphology_active_lime)
                ->type('edaphology_cation_exchange', $this->makeEdaphology()->edaphology_cation_exchange)
                ->type('edaphology_coarse_elements', $this->makeEdaphology()->edaphology_coarse_elements)
                ->type('edaphology_electric_conductivity', $this->makeEdaphology()->edaphology_electric_conductivity)
                ->type('edaphology_texture', $this->makeEdaphology()->edaphology_texture)
                ->type('edaphology_total_organic_matter', $this->makeEdaphology()->edaphology_total_organic_matter)
                ->type('edaphology_organic_carbon', $this->makeEdaphology()->edaphology_organic_carbon)
                ->type('edaphology_sand', $this->makeEdaphology()->edaphology_sand)
                ->type('edaphology_clay', $this->makeEdaphology()->edaphology_clay)
                ->type('edaphology_silt', $this->makeEdaphology()->edaphology_silt)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate . $this->firstPlot()->id)
                ->assertPathIs($this->pathToCreate . $this->firstPlot()->id);
        });
    }

    public function test_editor_cant_create_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate . $this->firstPlot()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate . $this->firstPlot()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
