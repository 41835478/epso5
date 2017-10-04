<?php

namespace Tests\Browser\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Helpers\UserHelpers;

class AgreementTest extends DuskTestCase
{
    use UserHelpers;

    protected $pathToAgreement  = '/dashboard/agreements/%s/edit';
    protected $pathToCheck      = '/dashboard/biocides/create';
    protected $ip               = '127.0.0.1';
    protected $dashboard        = '/dashboard';

    /*
    |--------------------------------------------------------------------------
    | Agreements
    |--------------------------------------------------------------------------
    */

    public function test_no_access_without_agreement()
    {
        $this->browse(function (Browser $browser) {
            //Values 
            $user = $this->createUserAgreement();
            $url  = sprintf($this->pathToAgreement, $user->id);
            //The test
            $browser->loginAs($user)
                ->visit($this->pathToCheck)
                ->assertPathIs($url)
                ->assertVisible('#agreement_text')
                ->press(trans('buttons.accepted'))
                ->assertSee(__('The user access conditions has been accepted'));
        });
    }
}
