<?php

use App\Repositories\AgronomicBiocides\AgronomicBiocide;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicBiocide
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicBiocide::class, function (Faker\Generator $faker) {
    return [
        'agronomicbiocide_name'            => $faker->company,
        // 'agronomicbiocide_word'            => $faker->word,
        // 'agronomicbiocide_words'           => $faker->words($nb = 3, $asText = true),
        // 'agronomicbiocide_email'           => $faker->unique()->safeEmail,
        // 'agronomicbiocide_description'     => $faker->sentence($nbWords = 10, $variableNbWords = true),
        // 'agronomicbiocide_phone'           => $faker->tollFreePhoneNumber,
        // 'agronomicbiocide_reference'       => $faker->shuffle('ABCDEF0123456789'),
        // 'agronomicbiocide_lat'             => $faker->latitude($min = -90, $max = 90),
        // 'agronomicbiocide_lng'             => $faker->longitude($min = -180, $max = 180),
        // 'agronomicbiocide_web'             => $faker->url,
        // 'agronomicbiocide_number'          => $faker->swiftBicNumber,
        // 'agronomicbiocide_randon_num'      => $faker->randomNumber($nbDigits = 4, $strict = false),
        // 'agronomicbiocide_zip'             => $faker->postcode,
        // 'agronomicbiocide_google'          => $faker->unique()->userName . '@gmail.com',
        // 'agronomicbiocide_linkedin'        => 'http://linkedin.com/' . $faker->slug,
        // 'agronomicbiocide_twitter'         => '@' . $faker->unique()->userName,
        // 'agronomicbiocide_facebook'        => 'http://www.facebook.com/user/' . $faker->slug,
        // 'agronomicbiocide_date'            => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});