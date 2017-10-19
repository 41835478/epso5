<?php

use App\Repositories\AgronomicBiocides\AgronomicBiocide;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicBiocide
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicBiocide::class, function (Faker\Generator $faker) {
    $plot = Plot::inRandomOrder()->first();
    return [
        'user_id'                   => $plot->user_id,
        'client_id'                 => $plot->client_id,
        'plot_id'                   => $plot->id,
        'crop_id'                   => $plot->crop_id,
        'biocide_id'                => rand(1, 1000),
        'agronomic_date'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'agronomic_quantity'        => rand(100, 100000),
        'agronomic_quantity_unit'   => rand(1, 5),
        'agronomic_biocide_secure'  => rand(10, 120),
        'agronomic_observations'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});