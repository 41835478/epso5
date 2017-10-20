<?php

namespace Tests\Browser\Tests\AgronomicCulturals;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicCulturalHelpers;

class AgronomicCulturalSearchTest extends DuskTestCase
{
    use AgronomicCulturalHelpers;
    
    protected $path = '/dashboard/agronomic_culturals';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_culturals
    |--------------------------------------------------------------------------
    */
    public function test_AgronomicCulturals_god_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_name', parent::reduceText($this->lastAgronomicCultural()->agronomiccultural_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicCultural()->agronomiccultural_name);
                    $table->assertDontSee($this->firstAgronomicCultural()->agronomiccultural_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastAgronomicCultural()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicCultural()->agronomiccultural_name);
                    $table->assertDontSee($this->firstAgronomicCultural()->agronomiccultural_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', parent::reduceText($this->lastAgronomicCultural()->client->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicCultural()->client_id;
                    $table->assertSee($this->lastAgronomicCultural()->client->client_name);
                    $table->assertDontSee($this->notThisClientAgronomicCultural($clientId)->client->client_name);
                });
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicCultural()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicCultural()->client_id;
                    $table->assertSee($this->lastAgronomicCultural()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicCultural($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicCultural()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicCultural()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicCultural()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicCulturals_editor_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path);
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicCultural()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicCultural()->client_id;
                    $table->assertSee($this->lastAgronomicCultural()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicCultural($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicCultural()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicCultural()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicCultural()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicCulturals_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->userAgronomicCultural($this->createUserBase()->id)->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->userAgronomicCultural($this->createUserBase()->id)->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicCultural()->plot->plot_name);
                });
        });
    }
}