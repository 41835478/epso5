<?php

namespace Tests\Browser\Tests\AgronomicPests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicPestHelpers;

class AgronomicPestSearchTest extends DuskTestCase
{
    use AgronomicPestHelpers;
    
    protected $path = '/dashboard/agronomic_pests';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_pests
    |--------------------------------------------------------------------------
    */
    public function test_AgronomicPests_god_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_name', $this->lastAgronomicPest()->agronomicpest_name)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicPest()->agronomicpest_name);
                    $table->assertDontSee($this->firstAgronomicPest()->agronomicpest_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_id', $this->lastAgronomicPest()->id)
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicPest()->agronomicpest_name);
                    $table->assertDontSee($this->firstAgronomicPest()->agronomicpest_name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', $this->lastAgronomicPest()->client->client_name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicPest()->client_id;
                    $table->assertSee($this->lastAgronomicPest()->client->client_name);
                    $table->assertDontSee($this->notThisClientAgronomicPest($clientId)->client->client_name);
                });
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', $this->lastAgronomicPest()->user->name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicPest()->client_id;
                    $table->assertSee($this->lastAgronomicPest()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicPest($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicPest()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(parent::reduceText($this->lastAgronomicPest()->plot->plot_name));
                    $table->assertDontSee(parent::reduceText($this->firstAgronomicPest()->plot->plot_name));
                });
        });
    }

    public function test_AgronomicPests_editor_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path);
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', $this->lastAgronomicPest()->user->name)
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicPest()->client_id;
                    $table->assertSee($this->lastAgronomicPest()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicPest($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicPest()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(parent::reduceText($this->lastAgronomicPest()->plot->plot_name));
                    $table->assertDontSee(parent::reduceText($this->firstAgronomicPest()->plot->plot_name));
                });
        });
    }

    public function test_AgronomicPests_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->userAgronomicPest($this->createUserBase()->id)->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee(parent::reduceText($this->userAgronomicPest($this->createUserBase()->id)->plot->plot_name));
                    $table->assertDontSee(parent::reduceText($this->firstAgronomicPest()->plot->plot_name));
                });
        });
    }
}