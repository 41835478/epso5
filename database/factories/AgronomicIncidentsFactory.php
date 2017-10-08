<?php

use App\Repositories\AgronomicIncidents\AgronomicIncident;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicIncident
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicIncident::class, function (Faker\Generator $faker) {
    $plot = Plot::inRandomOrder()->first();
    return [
        'user_id'                   => $plot->user_id,
        'client_id'                 => $plot->client_id,
        'plot_id'                   => $plot->id,
        'crop_id'                   => $plot->crop_id,
        'agronomic_date'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'agronomic_observations'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});