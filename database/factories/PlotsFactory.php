<?php

use App\Repositories\Cities\City;
use App\Repositories\Clients\Client;
use App\Repositories\Clients\ClientsRepository;
use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Patterns\Pattern;
use App\Repositories\Plots\Plot;
use App\Repositories\Trainings\Training;
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
    $client                         = Client::inRandomOrder()->first();
    $client_id                      = $client->id ?? 1;
    $user                           = User::whereClientId($client_id)->inRandomOrder()->first();
    $pattern                        = Pattern::whereCropId($client_id)->inRandomOrder()->first();
    $crop                           = $client->crop->all();
    $crop_id                        = $crop[0]['id'] ?? 1;
    $crop_module                    = $crop[0]['crop_module'] ?? 'vineyard';
    $crop_variety                   = CropVariety::whereCropId($crop_id)->inRandomOrder()->first();
    $city                           = City::inRandomOrder()->first();
    $training                       = rand(1, 2);
    $decimal                        = number_format(randonWithDecimals(), 2, '.', '');
    $number                         = rand(1000, 10000);
    $boolean                        = rand(0, 1);
    $percent                        = rand(1, 100);
    $plot_framework                 = $training . 'x' . $training;

    return [
        'client_id'                     => $client->id,
        'crop_id'                       => $crop_id,
        'crop_module'                   => $crop_module,
        'crop_variety_id'               => $crop_variety->id,
        'crop_variety_type'             => $crop_variety->crop_variety_type,
        'crop_quantity'                 => $number,
        'pattern_id'                    => $pattern->id ?? 1,
        'user_id'                       => $user->id ?? 1,
        'city_id'                       => $city->id,
        'region_id'                     => $city->region_id,
        'state_id'                      => $city->state_id,
        'country_id'                    => $city->country_id,
        'climatic_station_id'           => 1,
        'climatic_station_distance'     => $number,
        'plot_name'                     => $faker->company,
        'plot_reference'                => null,
        'plot_framework'                => $plot_framework,
        'crop_training'                 => $training,
        'plot_area'                     => $decimal,
        'plot_percent_cultivated_land'  => $percent,
        'plot_green_cover'              => $boolean,
        'plot_start_date'               => $faker->date($format = 'd/m/Y', $max = 'now'),
    ];
});