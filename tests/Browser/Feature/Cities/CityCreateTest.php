<?php

namespace Tests\Browser\Tests\Cities;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CityHelpers;

class CityCreateTest extends DuskTestCase
{
    use CityHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/cities/create';
    protected $pathToList   = '/dashboard/cities';


    /*
    |--------------------------------------------------------------------------
    | Add biocide
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_city()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('city_name', $this->makeCity()->city_name)
                ->type('city_lat', $this->makeCity()->city_lat)
                ->type('city_lng', $this->makeCity()->city_lng)
                ->select('country_id', $this->makeCity()->country_id)
                ->select('state_id', $this->makeCity()->state_id)
                ->pause('500')
                ->select('region_id', $this->makeCity()->region_id)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_city()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_city()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_city()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
