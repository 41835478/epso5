<?php

use App\Repositories\AgronomicIrrigations\AgronomicIrrigation;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicIrrigation
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicIrrigation::class, function (Faker\Generator $faker) {
    $plot = Plot::inRandomOrder()->first();
    return [
        'user_id'                   => $plot->user_id,
        'client_id'                 => $plot->client_id,
        'plot_id'                   => $plot->id,
        'crop_id'                   => $plot->crop_id,
        'agronomic_date'            => $faker->date($format = 'Y-m-d', $max = 'now'),
        'agronomic_quantity'        => rand(100, 10000),
        'agronomic_quantity_unit'   => rand(1, 2),
        'agronomic_observations'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});