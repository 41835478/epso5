<?php

namespace Tests\Browser\Tests\Users;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\ClientHelpers;

class UserSearchTest extends DuskTestCase
{
    use ClientHelpers;

    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/users')
                ->type('search_name', $this->createGod()->name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createGod()->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_email', $this->createGod()->email)
                ->pause(500)
                ->with('.table', function ($table){
                    $table->assertSee($this->createGod()->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', $this->createClientEpso()->client_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table
                        ->assertSee($this->createClientEpso()->client_name)
                        ->assertDontSee($this->createClientValencia()->client_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)   
                ->type('search_id', $this->createGod()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->createGod()->name);
                });           
        });
    }
}
