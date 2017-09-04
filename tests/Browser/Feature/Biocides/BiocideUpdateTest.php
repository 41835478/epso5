<?php

namespace Tests\Browser\Tests\Biocides;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\BiocideHelpers;

class BiocideUpdateTest extends DuskTestCase
{
    use BiocideHelpers;
    
    /*
    |--------------------------------------------------------------------------
    | Update clients
    |--------------------------------------------------------------------------
    */
    public function test_admin_can_update_a_biocide()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($admin = $this->createAdmin())
                ->visitRoute('dashboard.admin.biocides.edit', $this->lastBiocide()->id)
                ->type('biocide_name', $this->makeBiocide()->biocide_name)
                ->type('biocide_num', $this->makeBiocide()->biocide_num)
                ->type('biocide_formula', $this->makeBiocide()->biocide_formula)
                ->type('biocide_company', $this->makeBiocide()->biocide_company)
                ->press(trans('buttons.edit'))
                ->assertSee(__('The items has been updated successfuly'));
        });

        $this->assertDatabaseHas('biocides', [
            'biocide_name'      => $this->makeBiocide()->biocide_name,
            'biocide_num'       => $this->makeBiocide()->biocide_num,
            'biocide_formula'   => $this->makeBiocide()->biocide_formula,
            'biocide_company'   => $this->makeBiocide()->biocide_company,
        ]);
    }
}
