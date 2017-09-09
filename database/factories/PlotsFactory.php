<?php

use App\Repositories\Clients\Client;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Crops\Crop;
use App\Repositories\Patterns\Pattern;
use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for plots
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Plot::class, function (Faker\Generator $faker) {
    //Generate variables
    $crop_id                    = 1;
    $city_id                    = 1370; //Oliva/Valencia
    $country_id                 = 1; //España
    $state_id                   = 10; //C. Valenciana
    $region_id                  = 52; //Valencia
    $user_id                    = rand(1,4);
    $plot_quantity              = rand(500, 9000);
    $climatic_station_id        = 1;
    $climatic_station_distance  = 10.304543;
    $client_id                  = Client::inRandomOrder()->first();
    $crop_variety               = CropVariety::where('crop_id', $crop_id)->inRandomOrder()->first();
    $patter_id                  = Pattern::where('crop_id', $crop_id)->inRandomOrder()->first();
    $plot_framework_x           = rand(1,4);
    $plot_framework_y           = rand(1,4);
    $plot_area                  = rand(1000, 100000);
    $plot_green_cover           = strval(rand(0,1));

    return [
        'client_id'                 => $client_id,
        'user_id'                   => $user_id,
        'crop_id'                   => $crop_id,
        'crop_variety_id'           => $crop_variety->id,
        'pattern_id'                => $patter_id,
        'city_id'                   => $city_id,
        'country_id'                => $country_id,
        'state_id'                  => $state_id,
        'region_id'                 => $region_id,
        'climatic_station_id'       => $climatic_station_id,
        'climatic_station_distance' => $climatic_station_distance,
        'plot_name'                 => $faker->company,
        'plot_quantity'             => $plot_quantity,
        'plot_crop_type'            => $crop_variety->crop_variety_type,
        'plot_reference'            => $faker->shuffle('ABCDEF0123456789'),
        'plot_framework_x'          => $plot_framework_x,
        'plot_framework_y'          => $plot_framework_y,
        'plot_area'                 => $plot_area,
        'plot_green_cover'          => $plot_green_cover,
        'plot_start_date'           => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});