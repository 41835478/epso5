<?php

namespace Tests\Browser\Tests\Workers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\WorkerHelpers;

class WorkerCreateTest extends DuskTestCase
{
    use WorkerHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/workers/create';
    protected $pathToList   = '/dashboard/workers';


    /*
    |--------------------------------------------------------------------------
    | Add Worker
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                // ->type('worker_name', $this->makeWorker()->worker_name)
                // ->type('worker_description', $this->makeWorker()->worker_description)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_worker()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
