<?php

namespace Tests\Browser\Tests\Clients;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\CropHelpers;

class CropsVarietyTypesTest extends DuskTestCase
{
    use CropHelpers;

    protected $page = '/dashboard/crops';
    protected $pathToCreate = '/dashboard/crop_variety_types/create';

    /*
    |--------------------------------------------------------------------------
    | Search Crops
    |--------------------------------------------------------------------------
    */
    public function test_crop_variety_types()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($god = $this->createGod())
                ->visit($this->page)
                ->click('.button-crop_type-click')
                ->assertPathIs($this->pathToCreate)
                ->assertQueryStringHas('crop', 1)
                ->type('crop_variety_type_name[0]', 'Blanco')
                ->type('crop_variety_type_name[1]', 'Tinto')
                ->type('crop_variety_type_name[2]', 'Rosado')
                ->press(trans('buttons.new'))
                ->assertSee(__('The item has been create successfuly'));
        });

        $this->assertDatabaseHas('crop_variety_types', [
            'crop_id'                   => 1,
            'crop_variety_type_name'    => 'Blanco',
        ]);

        $this->assertDatabaseHas('crop_variety_types', [
            'crop_id'                   => 1,
            'crop_variety_type_name'    => 'Tinto',
        ]);

        $this->assertDatabaseHas('crop_variety_types', [
            'crop_id'                   => 1,
            'crop_variety_type_name'    => 'Rosado',
        ]);
    }
}
