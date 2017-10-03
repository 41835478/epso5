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
                ->type('search_name', $this->lastWorker()->worker_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_name);
                    $table->assertDontSee($this->firstWorker()->worker_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastWorker()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastWorker()->worker_name);
                    $table->assertDontSee($this->firstWorker()->worker_name);
                });
        });
    }
}