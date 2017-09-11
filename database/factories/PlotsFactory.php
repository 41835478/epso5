<?php

use App\Repositories\Cities\City;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Patterns\Pattern;
use App\Repositories\Plots\Plot;
use App\Repositories\Users\User;

/*
|--------------------------------------------------------------------------
| Factory for Plot
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Plot::class, function (Faker\Generator $faker) {
    /**
     * @var Defaults
     */    
    $defaultValue                   = 1;
    $crop_variety                   = CropVariety::inRandomOrder()->first();
    $pattern                        = Pattern::where('crop_id', $defaultValue)->inRandomOrder()->first();
    $city                           = City::inRandomOrder()->first();
    $distance                       = randonWithDecimals();
    $number                         = rand(1000, 10000);
    $boolean                        = rand(0, 1);
    $plot_reference                 = null;
    $user                           = rand(1, 4);
    $plot_framework                 = $user . 'x' . $user;
    $select                         = rand(1, 2);

    return [
        'client_id'                 => $client ?? $select,
        'crop_id'                   => ($select == 1) ? 2 : 1,
        'crop_variety_id'           => $crop_variety->id,
        'pattern_id'                => $pattern->id,
        'user_id'                   => $user,
        'city_id'                   => $city->id,
        'region_id'                 => $city->region_id,
        'state_id'                  => $city->state_id,
        'country_id'                => $city->country_id,
        'climatic_station_id'       => $defaultValue,
        'climatic_station_distance' => $distance,
        'plot_name'                 => $faker->company,
        'plot_quantity'             => $number,
        'plot_crop_type'            => $boolean,
        'plot_reference'            => $plot_reference,
        'plot_framework'            => $plot_framework,
        'plot_area'                 => $number,
        'plot_green_cover'          => $boolean,
        'plot_start_date'           => $faker->date($format = 'd/m/Y', $max = 'now'),
    ];
});