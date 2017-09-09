<?php

use App\Repositories\Cities\City;

/*
|--------------------------------------------------------------------------
| Factory for Cities
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(City::class, function (Faker\Generator $faker) {
    return [
        'city_name'     => $faker->city,
        'city_lat'      => $faker->latitude($min = -90, $max = 90),
        'city_lng'      => $faker->longitude($min = -180, $max = 180),
    ];
});