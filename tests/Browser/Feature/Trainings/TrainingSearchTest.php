<?php

namespace Tests\Browser\Tests\Trainings;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\TrainingHelpers;

class TrainingSearchTest extends DuskTestCase
{
    use TrainingHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Search users
    |--------------------------------------------------------------------------
    */
    public function test_training_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit('/dashboard/trainings')
                ->type('search_name', $this->lastTraining()->training_name)
                ->waitForText($this->lastTraining()->training_description)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastTraining()->training_description);
                    $table->assertDontSee($this->firstTraining()->training_description);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastTraining()->id)
                ->waitForText($this->lastTraining()->training_name)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastTraining()->training_name);
                    $table->assertDontSee($this->firstTraining()->training_description);
                });
        });
    }
}
