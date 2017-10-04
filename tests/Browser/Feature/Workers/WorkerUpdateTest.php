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
    
    protected $route = 'dashboard.user.workers.edit';

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
                ->type('worker_nif', $this->makeWorker()->worker_nif)
                ->type('worker_start', str_replace('/', '', $this->makeWorker()->worker_start))
                ->type('worker_ropo', $this->makeWorker()->worker_ropo)
                ->type('worker_ropo_date', str_replace('/', '', $this->makeWorker()->worker_ropo_date))
                ->select('worker_ropo_level', $this->makeWorker()->worker_ropo_level)
                ->type('worker_observations', $this->makeWorker()->worker_observations)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('workers', [
            'worker_name'           => $this->makeWorker()->worker_name,
            'worker_nif'            => $this->makeWorker()->worker_nif,
            'worker_ropo'           => $this->makeWorker()->worker_ropo,
            'worker_ropo_level'     => $this->makeWorker()->worker_ropo_level,
            'worker_observations'   => $this->makeWorker()->worker_observations,
        ]);
    }
}
