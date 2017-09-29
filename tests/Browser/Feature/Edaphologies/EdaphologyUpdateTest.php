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
    
    protected $route = 'dashboard.admin.edaphologies.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_edaphology()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastEdaphology()->id)
                ->type('edaphology_name', $this->makeEdaphology()->edaphology_name)
                // ->type('edaphology_description', $this->makeEdaphology()->edaphology_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('edaphologies', [
            'edaphology_name'           => $this->makeEdaphology()->edaphology_name,
            // 'edaphology_description'    => $this->makeEdaphology()->edaphology_description,
        ]);
    }
}
