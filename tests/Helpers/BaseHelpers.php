<?php 

namespace Tests\Helpers;

use App\Repositories\Users\User;

trait BaseHelpers
{    
    protected $testingConnection = 'testing';
    protected $makePassword;

    /**
     * Returning the testing table
     *
     * @param  string $table
     *
     * @return string
     */
    public function getTestingTable(string $table) : string
    {
        return $this->testingConnection . '.' . $table;
    }

    /**
     * Make a password
     *
     * @param  string $length
     *
     * @return string
     */
    public function makePassword(int $length = 10) : string
    {
        if($this->makePassword) {
            return $this->makePassword;
        }
        return $this->makePassword = generate_password($length);
    }

    /**
     * Get value from a selector
     * @param object $browser
     * @param string $selector
     * 
     * @return mixed
     */
    public function getValueFromSelector($browser, $selector)
    {
        return $browser->script("document.querySelector('{$selector}').value;")[0];
    }

    /**
     * Reduce the text length
     * @param string $text
     * @param int $length
     * 
     * @return mixed
     */
    public function reduceText($text, $length = 7)
    {
        return substr(str_replace('<br>', '', $text), 0, $length);
    }
}