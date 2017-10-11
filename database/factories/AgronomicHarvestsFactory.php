<?php

use App\Repositories\AgronomicHarvests\AgronomicHarvest;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicHarvest
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicHarvest::class, function (Faker\Generator $faker) {
    $plot = Plot::inRandomOrder()->first();
    return [
        'user_id'                   => $plot->user_id,
        'client_id'                 => $plot->client_id,
        'plot_id'                   => $plot->id,
        'crop_id'                   => $plot->crop_id,
        'agronomic_date'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'agronomic_quantity'        => rand(100, 10000),
        'agronomic_quantity_unit'   => rand(1, 3),
        'agronomic_observations'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});