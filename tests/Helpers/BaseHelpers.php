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
}