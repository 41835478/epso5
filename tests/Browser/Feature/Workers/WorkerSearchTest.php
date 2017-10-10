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
                ->type('search_worker', parent::reduceText($this->lastWorker()->worker_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee(typeText($this->lastWorker()->worker_name));
                    $table->assertDontSee($this->firstWorker()->worker_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_nif', parent::reduceText($this->lastWorker()->worker_nif))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_nif);
                    $table->assertDontSee($this->firstWorker()->worker_nif);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_ropo', parent::reduceText($this->lastWorker()->worker_ropo))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_ropo);
                    $table->assertDontSee($this->firstWorker()->worker_ropo);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->select('search_level', $this->lastWorker()->worker_ropo_level)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $list = sections('workers.ropo:level');
                    $level = $list[$this->lastWorker()->worker_ropo_level];
                    $table->assertSee($level);
                    $table->assertDontSee(random_array(array_except($list, $level)));
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', parent::reduceText($this->firstWorker()->client->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->firstWorker()->client_id;
                    $table->assertSee($this->firstWorker()->client->client_name);
                    $table->assertDontSee($this->workerNotThisClient($clientId)->client->client_name);
                });
        
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->firstWorker()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->firstWorker()->client_id;
                    $table->assertSee($this->firstWorker()->user->name);
                    $table->assertDontSee($this->workerNotThisClient($clientId)->user->name);
                });
        });
    }
}