<?php

namespace Tests\Browser;

use App\Repositories\Users\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserSearchTest extends DuskTestCase
{
    protected $usersRoute;
    protected $usersURL = '/dashboard/users';

     /*
     |--------------------------------------------------------------------------
     | Search users
     |--------------------------------------------------------------------------
     */
     public function test_user_search()
     {
         $this->browse(function (Browser $browser) {
             $browser->loginAs($god = $this->createGod())
                 ->visit($this->usersURL)
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
                 ->type('search_client', $this->createClient())
                 ->pause(500)
                 ->with('.table', function ($table) {
                     $table
                         ->assertSee($this->createClient())
                         ->assertDontSee($this->createClient(2));
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
