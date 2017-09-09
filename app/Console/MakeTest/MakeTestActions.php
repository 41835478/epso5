<?php

namespace App\Console\MakeTest;

trait MakeTestActions
{
    /**
     * Create a helper
     *
     * @return mixed
     */
    public function createHelper()
    {
        $this->create('helper')->stub('helper')->generate();
    }

    /**
     * Create a helper
     *
     * @return mixed
     */
    public function createFactory()
    {
        $this->create('factory')->stub('factory')->generate();
    }

    /**
     * Create the tests
     *
     * @return mixed
     */
    public function createTests()
    {
        $this->create('test:create')->stub('test_create')->generate();
        $this->create('test:search')->stub('test_search')->generate();
        $this->create('test:update')->stub('test_update')->generate();
    }
}