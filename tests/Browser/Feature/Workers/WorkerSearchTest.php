<?php

namespace Tests\Browser\Tests\Workers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\WorkerHelpers;

class WorkerSearchTest extends DuskTestCase
{
    use WorkerHelpers;
    
    protected $path = '/dashboard/workers';

    /*
    |--------------------------------------------------------------------------
    | Search workers
    |--------------------------------------------------------------------------
    */
    public function test_worker_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_worker', $this->lastWorker()->worker_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_name);
                    $table->assertDontSee($this->firstWorker()->worker_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_nif', $this->lastWorker()->worker_nif)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_nif);
                    $table->assertDontSee($this->firstWorker()->worker_nif);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_ropo', $this->lastWorker()->worker_ropo)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_ropo);
                    $table->assertDontSee($this->firstWorker()->worker_ropo);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->select('search_level', $this->lastWorker()->worker_ropo_level)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(sections('workers.ropo:level')[$this->lastWorker()->worker_ropo_level]);
                    $table->assertDontSee(sections('workers.ropo:level')[$this->firstWorker()->worker_ropo_level]);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', $this->lastWorker()->client->client_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $clientId = $this->lastWorker()->client_id;
                    $table->assertSee($this->lastWorker()->client->client_name);
                    $table->assertDontSee($this->workerNotThisClient($clientId)->client->client_name);
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', $this->lastWorker()->user->name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $clientId = $this->lastWorker()->client_id;
                    $table->assertSee($this->lastWorker()->user->name);
                    $table->assertDontSee($this->workerNotThisClient($clientId)->user->name);
                });
        });
    }
}