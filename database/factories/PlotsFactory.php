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
    $select                         = rand(1, 2);
    $crop_variety                   = CropVariety::inRandomOrder()->whereCropId($select)->first();
    $pattern                        = Pattern::whereCropId($select)->inRandomOrder()->first();
    $city                           = City::inRandomOrder()->first();
    $distance                       = randonWithDecimals();
    $number                         = rand(1000, 10000);
    $boolean                        = rand(0, 1);
    $percent                        = rand(1, 100);
    $plot_reference                 = null;
    $user                           = rand(1, 4);
    $plot_framework                 = $user . $user;

    return [
        'client_id'                     => $client ?? $select,
        'crop_id'                       => $select,
        'crop_module'                   => ($select == 1) ? 'vineyard' : 'grape',
        'crop_variety_id'               => $crop_variety->id,
        'crop_variety_type'             => $crop_variety->crop_variety_type,
        'crop_quantity'                 => $number,
        'pattern_id'                    => $pattern->id,
        'user_id'                       => $user,
        'city_id'                       => $city->id,
        'region_id'                     => $city->region_id,
        'state_id'                      => $city->state_id,
        'country_id'                    => $city->country_id,
        'climatic_station_id'           => $defaultValue,
        'climatic_station_distance'     => $distance,
        'plot_name'                     => $faker->company,
        'plot_reference'                => $plot_reference,
        'plot_framework'                => $plot_framework,
        'plot_training'                 => $user,
        'plot_area'                     => $number,
        'plot_percent_cultivated_land'  => $percent,
        'plot_green_cover'              => $boolean,
        'plot_start_date'               => $faker->date($format = 'd/m/Y', $max = 'now'),
    ];
});