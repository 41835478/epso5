<?php

namespace Tests\Browser\Tests\Workers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\WorkerHelpers;

class WorkerUpdateTest extends DuskTestCase
{
    use WorkerHelpers;
    
    protected $route = 'dashboard.admin.workers.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastWorker()->id)
                ->type('worker_name', $this->makeWorker()->worker_name)
                // ->type('worker_description', $this->makeWorker()->worker_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('workers', [
            'worker_name'           => $this->makeWorker()->worker_name,
            // 'worker_description'    => $this->makeWorker()->worker_description,
        ]);
    }
}
