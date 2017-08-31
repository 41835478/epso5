<?php

namespace Tests;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\TestHelpers;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, TestHelpers;
}
