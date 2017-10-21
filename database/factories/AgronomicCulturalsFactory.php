<?php

use App\Repositories\AgronomicCulturals\AgronomicCultural;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicCultural
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicCultural::class, function (Faker\Generator $faker) {
    $plot = Plot::inRandomOrder()->first();
    $type = rand(1, 10);
    $fertilizer_type = null;
    $fertilizer = null;
    if($type == 1 || $type == 2) {
        $fertilizer_type = rand(1, 2);
        $fertilizer = $faker->words($nb = 3, $asText = true);
        if($fertilizer_type == 1) {
            $fertilizer = select('organics')[rand(1, 10)];
        }
    }
    return [
        'user_id'                   => $plot->user_id,
        'client_id'                 => $plot->client_id,
        'plot_id'                   => $plot->id,
        'crop_id'                   => $plot->crop_id,
        'agronomic_date'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'agronomic_quantity'        => rand(100, 100000),
        'agronomic_quantity_unit'   => rand(1, 6),
        'agronomic_observations'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'agronomic_type'            => $type,
        'agronomic_fertilizer_type' => $fertilizer_type,
        'agronomic_fertilizer_name' => $fertilizer,
    ];
});