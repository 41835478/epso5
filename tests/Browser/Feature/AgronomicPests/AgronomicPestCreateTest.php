<?php

namespace Tests\Browser\Tests\AgronomicPests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicPestHelpers;
use Tests\Helpers\PestHelpers;

class AgronomicPestCreateTest extends DuskTestCase
{
    use AgronomicPestHelpers, PestHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_pests/create';
    protected $pathToList   = '/dashboard/agronomic_pests';

    /*
    |--------------------------------------------------------------------------
    | Add AgronomicPest
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_AgronomicPests()
    {
        //Variables 
        $pest = $this->pestByCrop($this->makeAgronomicPest()->crop_id)->id;
        //Tests
        $this->browse(function (Browser $browser) use ($pest) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', $this->makeAgronomicPest()->client_id)->pause(1000)
                ->select('user_id', $this->makeAgronomicPest()->user_id)->pause(1000)
                ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:last-child'))->pause(1000)
                ->select('pest_id', $pest)
                ->type('agronomic_date', $this->makeAgronomicPest()->agronomic_date)
                ->type('agronomic_observations', $this->makeAgronomicPest()->agronomic_observations)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_pests', [
            'client_id'                 => $this->makeAgronomicPest->client_id,
            'user_id'                   => $this->makeAgronomicPest->user_id,
            'pest_id'                   => $pest,
            'agronomic_date'            => date_to_db($this->makeAgronomicPest()->agronomic_date),
            'agronomic_observations'    => $this->makeAgronomicPest()->agronomic_observations,
        ]);
    }

    public function test_admin_can_create_AgronomicPests()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertVisible('#client_id')
                ->assertVisible('#user_id')
                ->assertVisible('#plot_id')
                ->assertVisible('#pest_id');
        });
    }

    public function test_editor_can_create_AgronomicPests()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('#client_id')
                ->assertVisible('#user_id')
                ->assertVisible('#plot_id')
                ->assertVisible('#pest_id');
        });
    }

    public function test_user_can_create_AgronomicPests()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('#client_id')
                ->assertMissing('#user_id')
                ->assertVisible('#plot_id')
                ->assertVisible('#pest_id');
        });
    }
}
