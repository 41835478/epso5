<?php

use App\Repositories\Geolocations\Geolocation;

/*
|--------------------------------------------------------------------------
| Users and Profile Factories
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Geolocation::class, function (Faker\Generator $faker) {
    //Generate variables
    $bbox = $faker->randomNumber($nbDigits = 6, $strict = false) . ',' . 
            $faker->randomNumber($nbDigits = 6, $strict = false) . ',' . 
            $faker->randomNumber($nbDigits = 6, $strict = false) . ',' . 
            $faker->randomNumber($nbDigits = 6, $strict = false);

    return [
        'geo_lat'                   => $faker->latitude($min = -90, $max = 90),
        'geo_lng'                   => $faker->longitude($min = -180, $max = 180),
        'geo_x'                     => rand(1000, 10000),
        'geo_y'                     => rand(1000, 10000),
        'geo_bbox'                  => $bbox,
        'geo_sigpac_region'         => $faker->randomNumber($nbDigits = 4, $strict = false),
        'geo_sigpac_city'           => $faker->randomNumber($nbDigits = 4, $strict = false),
        'geo_sigpac_aggregate'      => $faker->randomNumber($nbDigits = 2, $strict = false),
        'geo_sigpac_zone'           => $faker->randomNumber($nbDigits = 2, $strict = false),
        'geo_sigpac_polygon'        => $faker->randomNumber($nbDigits = 4, $strict = false),
        'geo_sigpac_plot'           => $faker->randomNumber($nbDigits = 4, $strict = false),
        'geo_sigpac_precinct'       => $faker->randomNumber($nbDigits = 4, $strict = false),
        'geo_catastro'              => $faker->swiftBicNumber,
        'geo_zip'                   => $faker->postcode,
        'geo_height'                => rand(10, 1000),
    ];
});