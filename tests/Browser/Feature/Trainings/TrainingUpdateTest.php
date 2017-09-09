<?php

namespace Tests\Browser\Tests\Trainings;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\TrainingHelpers;

class TrainingUpdateTest extends DuskTestCase
{
    use TrainingHelpers;
    
    protected $route = 'dashboard.admin.trainings.edit';

    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_training()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute($this->route, $this->lastTraining()->id)
                ->type('training_name', $this->makeTraining()->training_name)
                ->type('training_description', $this->makeTraining()->training_description)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('trainings', [
            'training_name'           => $this->makeTraining()->training_name,
            'training_description'    => $this->makeTraining()->training_description,
        ]);
    }
}
