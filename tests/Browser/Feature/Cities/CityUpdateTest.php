<?php

namespace Tests\Browser\Tests\Cities;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CityHelpers;

class CityUpdateTest extends DuskTestCase
{
    use CityHelpers;
    
    protected $route = 'dashboard.admin.cities.edit';//$this->route

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_city()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastCity()->id)
                ->type('city_name', $this->makeCity()->city_name)
                ->type('city_lat', $this->makeCity()->city_lat)
                ->type('city_lng', $this->makeCity()->city_lng)
                ->select('country_id', $this->makeCity()->country_id)
                ->select('state_id', null)
                ->select('state_id', $this->makeCity()->state_id)
                ->pause('1000')
                ->select('region_id', $this->makeCity()->region_id)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('cities', [
            'city_name'     => $this->makeCity()->city_name,
            'city_lat'      => $this->makeCity()->city_lat,
            'city_lng'      => $this->makeCity()->city_lng,
            'country_id'    => $this->makeCity()->country_id,
            'state_id'      => $this->makeCity()->state_id,
            'region_id'     => $this->makeCity()->region_id,
        ]);
    }
}
