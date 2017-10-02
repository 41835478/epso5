<?php

namespace Tests\Browser\Tests\Edaphologies;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\EdaphologyHelpers;

class EdaphologyUpdateTest extends DuskTestCase
{
    use EdaphologyHelpers;
    
    protected $route        = 'dashboard.admin.edaphologies.edit';
    protected $dashboard    = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_god_can_update_a_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visitRoute($this->route, $this->lastEdaphology()->id)
                ->select('edaphology_level', $this->makeEdaphology()->edaphology_level)
                ->type('edaphology_lat', $this->makeEdaphology()->edaphology_lat)
                ->type('edaphology_lng', $this->makeEdaphology()->edaphology_lng)
                ->type('edaphology_reference', $this->makeEdaphology()->edaphology_reference)
                ->type('edaphology_name', $this->makeEdaphology()->edaphology_name)
                ->type('edaphology_observations', $this->makeEdaphology()->edaphology_observations)
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
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('edaphologies', [
            'edaphology_level'                          => $this->makeEdaphology()->edaphology_level,
            'edaphology_name'                           => $this->makeEdaphology()->edaphology_name,
            'edaphology_observations'                   => $this->makeEdaphology()->edaphology_observations,
            'edaphology_lat'                            => $this->makeEdaphology()->edaphology_lat,
            'edaphology_lng'                            => $this->makeEdaphology()->edaphology_lng,
            'edaphology_reference'                      => $this->makeEdaphology()->edaphology_reference,
            'edaphology_ph'                             => $this->makeEdaphology()->edaphology_ph,
            'edaphology_aggregate_stability'            => $this->makeEdaphology()->edaphology_aggregate_stability,
            'edaphology_calcium_carbonate_equivalent'   => $this->makeEdaphology()->edaphology_calcium_carbonate_equivalent,
            'edaphology_active_lime'                    => $this->makeEdaphology()->edaphology_active_lime,
            'edaphology_cation_exchange'                => $this->makeEdaphology()->edaphology_cation_exchange,
            'edaphology_coarse_elements'                => $this->makeEdaphology()->edaphology_coarse_elements,
            'edaphology_electric_conductivity'          => $this->makeEdaphology()->edaphology_electric_conductivity,
            'edaphology_texture'                        => $this->makeEdaphology()->edaphology_texture,
            'edaphology_total_organic_matter'           => $this->makeEdaphology()->edaphology_total_organic_matter,
            'edaphology_organic_carbon'                 => $this->makeEdaphology()->edaphology_organic_carbon,
            'edaphology_sand'                           => $this->makeEdaphology()->edaphology_sand,
            'edaphology_clay'                           => $this->makeEdaphology()->edaphology_clay,
            'edaphology_silt'                           => $this->makeEdaphology()->edaphology_silt,
        ]);
    }

    public function test_admin_can_update_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastEdaphology()->id)
                ->assertInputValue('edaphology_observations', $this->lastEdaphology()->edaphology_observations);
        });
    }

    public function test_editor_cant_update_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visitRoute($this->route, $this->lastEdaphology()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_update_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visitRoute($this->route, $this->lastEdaphology()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
