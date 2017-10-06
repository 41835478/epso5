<?php

namespace Tests\Browser\Tests\AgronomicIrrigations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicIrrigationHelpers;

class AgronomicIrrigationUpdateTest extends DuskTestCase
{
    use AgronomicIrrigationHelpers;
    
    protected $route = 'dashboard.admin.agronomic_irrigations.edit';
    protected $dashboard = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Update AgronomicIrrigations
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_agronomicirrigation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastAgronomicIrrigation()->id)
                ->type('agronomicirrigation_name', $this->makeAgronomicIrrigation()->agronomicirrigation_name)
                // ->type('agronomicirrigation_description', $this->makeAgronomicIrrigation()->agronomicirrigation_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('agronomic_irrigations', [
            'agronomicirrigation_name'           => $this->makeAgronomicIrrigation()->agronomicirrigation_name,
            // 'agronomicirrigation_description'    => $this->makeAgronomicIrrigation()->agronomicirrigation_description,
        ]);
    }

    public function test_user_cant_update_a_worker_from_other_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visitRoute($this->route, $this->lastAgronomicIrrigation()->id)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
