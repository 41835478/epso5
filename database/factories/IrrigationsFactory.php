<?php

use App\Repositories\Irrigations\Irrigation;

/*
|--------------------------------------------------------------------------
| Factory for geolocations
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Irrigation::class, function (Faker\Generator $faker) {
    return [
        'irrigation_name'           => $faker->company,
        'irrigation_description'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});