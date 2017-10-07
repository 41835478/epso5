<?php

namespace Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
use Tests\Helpers\BaseHelpers;
use Tests\Helpers\UserHelpers;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    use BaseHelpers, UserHelpers;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()
        );
    }

    /**
     * Get value from a selector
     * @param object $browser
     * @param string $selector
     * 
     * @return mixed
     */
    public function getValue($browser, $selector)
    {
        return $browser->script("$( '" . $selector . "' ).val()")[0];
    }
}
