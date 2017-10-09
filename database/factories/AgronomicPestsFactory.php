<?php

use App\Repositories\AgronomicPests\AgronomicPest;
use App\Repositories\Pests\Pest;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicPest
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicPest::class, function (Faker\Generator $faker) {
    $plot = Plot::inRandomOrder()->first();
    $pest = Pest::whereCropId($plot->crop_id)->inRandomOrder()->first();
    return [
        'user_id'                   => $plot->user_id,
        'client_id'                 => $plot->client_id,
        'plot_id'                   => $plot->id,
        'crop_id'                   => $plot->crop_id,
        'pest_id'                   => $pest->id,
        'agronomic_date'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'agronomic_observations'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});