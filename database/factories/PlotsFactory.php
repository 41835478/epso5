<?php

use App\Repositories\Plots\Plot;

/*
|--------------------------------------------------------------------------
| Factory for Plot
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Plot::class, function (Faker\Generator $faker) {
    return [
        'plot_name'            => $faker->company,
        // 'DummySingula_email'            => $faker->unique()->safeEmail,
        // 'plot_description'     => $faker->sentence($nbWords = 10, $variableNbWords = true),
        // 'plot_phone'           => $faker->tollFreePhoneNumber,
        // 'plot_reference'       => $faker->shuffle('ABCDEF0123456789'),
        // 'plot_lat'             => $faker->latitude($min = -90, $max = 90),
        // 'plot_lng'             => $faker->longitude($min = -180, $max = 180),
        // 'plot_web'             => $faker->url,
        // 'plot_number'          => $faker->swiftBicNumber,
        // 'plot_randon_num'      => $faker->randomNumber($nbDigits = 4, $strict = false),
        // 'plot_zip'             => $faker->postcode,
        // 'plot_google'          => $faker->unique()->userName . '@gmail.com',
        // 'plot_linkedin'        => 'http://linkedin.com/' . $faker->slug,
        // 'plot_twitter'         => '@' . $faker->unique()->userName,
        // 'plot_facebook'        => 'http://www.facebook.com/user/' . $faker->slug,
    ];
});