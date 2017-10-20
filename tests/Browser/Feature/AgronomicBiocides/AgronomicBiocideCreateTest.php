<?php

namespace Tests\Browser\Tests\AgronomicBiocides;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicBiocideHelpers;

class AgronomicBiocideCreateTest extends DuskTestCase
{
    use AgronomicBiocideHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/agronomic_biocides/create';
    protected $pathToList   = '/dashboard/agronomic_biocides';
    protected $biocide      = 'MASTER D';
    protected $biocide_id   = 488;
    protected $secure       = 100;

    /*
    |--------------------------------------------------------------------------
    | Add AgronomicBiocide
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_AgronomicBiocides()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->select('client_id', 1)->pause(1000)
                ->select('user_id', 1)->pause(1000)
                ->select('plot_id', $this->getValueFromSelector($browser, $selector = '#plot_id option:last-child'))->pause(1000)
                ->select('worker_id', $this->getValueFromSelector($browser, $selector = '#worker_id option:last-child'))
                ->type('agronomic_date', $this->makeAgronomicBiocide()->agronomic_date)
                ->type('agronomic_quantity', $this->makeAgronomicBiocide()->agronomic_quantity)
                ->select('agronomic_quantity_unit', $this->makeAgronomicBiocide()->agronomic_quantity_unit)
                ->type('agronomic_biocide_secure', $this->secure)
                ->type('agronomic_observations', $this->makeAgronomicBiocide()->agronomic_observations)
                ->type('#biocide', $this->reduceText($this->biocide, 5))->pause(1000)
                ->with('.autocomplete-suggestion', function ($field) {
                    $field->assertSee($this->biocide);
                })
                ->click("[data-name='{$this->biocide}']")
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('agronomic_biocides', [
            'client_id'                 => 1,
            'user_id'                   => 1,
            'biocide_id'                => $this->biocide_id,
            'agronomic_biocide_secure'  => $this->secure,
            'agronomic_date'            => date_to_db($this->makeAgronomicBiocide()->agronomic_date),
            'agronomic_quantity'        => $this->makeAgronomicBiocide()->agronomic_quantity,
            'agronomic_quantity_unit'   => $this->makeAgronomicBiocide()->agronomic_quantity_unit,
            'agronomic_observations'    => $this->makeAgronomicBiocide()->agronomic_observations,
        ]);
    }

    public function test_admin_can_create_AgronomicBiocides()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertVisible('#client_id')
                ->assertVisible('#user_id')
                ->assertVisible('#plot_id');
        });
    }

    public function test_editor_can_create_AgronomicBiocides()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('#client_id')
                ->assertVisible('#user_id')
                ->assertVisible('#plot_id');
        });
    }

    public function test_user_can_create_AgronomicBiocides()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate)
                ->assertMissing('#client_id')
                ->assertMissing('#user_id')
                ->assertVisible('#plot_id');
        });
    }
}
