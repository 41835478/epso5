<?php

namespace Tests\Browser\Tests\Biocides;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\BiocideHelpers;

class BiocideCreateTest extends DuskTestCase
{
    use BiocideHelpers;

    protected $dashboard    = '/dashboard';
    protected $pathToCreate = '/dashboard/biocides/create';
    protected $pathToList   = '/dashboard/biocides';


    /*
    |--------------------------------------------------------------------------
    | Add biocide
    |--------------------------------------------------------------------------
    */

    public function test_god_can_create_a_biocide()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->pathToList)
                ->click('#button-config')
                ->click('#button-create-link')
                ->assertPathIs($this->pathToCreate)
                ->type('biocide_name', $this->makeBiocide()->biocide_name)
                ->type('biocide_num', $this->makeBiocide()->biocide_num)
                ->type('biocide_company', $this->makeBiocide()->biocide_company)
                ->type('biocide_formula', $this->makeBiocide()->biocide_formula)
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });
    }

    public function test_admin_can_create_biocide()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->pathToCreate);
        });
    }

    public function test_editor_cant_create_biocide()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($editor = $this->createEditor())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }

    public function test_user_cant_create_biocide()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($user = $this->createUser())
                ->visit($this->pathToCreate)
                ->assertPathIs($this->dashboard)
                ->assertSee(__('Your are not authorized to access this section'));
        });
    }
}
