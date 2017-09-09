<?php

use App\Repositories\Configs\Config;

/*
|--------------------------------------------------------------------------
| Users and Profile Factories
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Config::class, function (Faker\Generator $faker) {
    return [
        'config_name'           => $faker->company,
        'config_description'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});