<?php

namespace Tests\Browser\Tests\AgronomicBiocides;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\AgronomicBiocideHelpers;

class AgronomicBiocideSearchTest extends DuskTestCase
{
    use AgronomicBiocideHelpers;
    
    protected $path     = '/dashboard/agronomic_biocides';
    protected $biocide  = 'MASTER D';

    /*
    |--------------------------------------------------------------------------
    | Search agronomic_biocides
    |--------------------------------------------------------------------------
    */
    public function test_AgronomicBiocides_god_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->path)
                ->type('search_biocide', parent::reduceText($this->biocide))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->biocide);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_client', parent::reduceText($this->lastAgronomicBiocide()->client->client_name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicBiocide()->client_id;
                    $table->assertSee($this->lastAgronomicBiocide()->client->client_name);
                    $table->assertDontSee($this->notThisClientAgronomicBiocide($clientId)->client->client_name);
                });
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicBiocide()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicBiocide()->client_id;
                    $table->assertSee($this->lastAgronomicBiocide()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicBiocide($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicBiocide()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicBiocide()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicBiocide()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicBiocides_editor_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->path);
            
            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_user', parent::reduceText($this->lastAgronomicBiocide()->user->name))
                ->pause(1000)
                ->with('.table', function ($table) {
                    $clientId = $this->lastAgronomicBiocide()->client_id;
                    $table->assertSee($this->lastAgronomicBiocide()->user->name);
                    $table->assertDontSee($this->notThisClientAgronomicBiocide($clientId)->user->name);
                });

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->lastAgronomicBiocide()->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->lastAgronomicBiocide()->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicBiocide()->plot->plot_name);
                });
        });
    }

    public function test_AgronomicBiocides_user_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUserBase())
                ->visit($this->path);

            $browser->click('.buttons-reset')
                ->pause(500)
                ->type('search_plot', parent::reduceText($this->userAgronomicBiocide($this->createUserBase()->id)->plot->plot_name))
                ->pause(500)
                ->with('.table', function ($table) {
                    $table->assertSee($this->userAgronomicBiocide($this->createUserBase()->id)->plot->plot_name);
                    $table->assertDontSee($this->firstAgronomicBiocide()->plot->plot_name);
                });
        });
    }
}