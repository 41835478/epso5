<?php

use App\Repositories\AgronomicCulturals\AgronomicCultural;

/*
|--------------------------------------------------------------------------
| Factory for AgronomicCultural
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(AgronomicCultural::class, function (Faker\Generator $faker) {
    return [
        'agronomiccultural_name'            => $faker->company,
        // 'agronomiccultural_word'            => $faker->word,
        // 'agronomiccultural_words'           => $faker->words($nb = 3, $asText = true),
        // 'agronomiccultural_email'           => $faker->unique()->safeEmail,
        // 'agronomiccultural_description'     => $faker->sentence($nbWords = 10, $variableNbWords = true),
        // 'agronomiccultural_phone'           => $faker->tollFreePhoneNumber,
        // 'agronomiccultural_reference'       => $faker->shuffle('ABCDEF0123456789'),
        // 'agronomiccultural_lat'             => $faker->latitude($min = -90, $max = 90),
        // 'agronomiccultural_lng'             => $faker->longitude($min = -180, $max = 180),
        // 'agronomiccultural_web'             => $faker->url,
        // 'agronomiccultural_number'          => $faker->swiftBicNumber,
        // 'agronomiccultural_randon_num'      => $faker->randomNumber($nbDigits = 4, $strict = false),
        // 'agronomiccultural_zip'             => $faker->postcode,
        // 'agronomiccultural_google'          => $faker->unique()->userName . '@gmail.com',
        // 'agronomiccultural_linkedin'        => 'http://linkedin.com/' . $faker->slug,
        // 'agronomiccultural_twitter'         => '@' . $faker->unique()->userName,
        // 'agronomiccultural_facebook'        => 'http://www.facebook.com/user/' . $faker->slug,
        // 'agronomiccultural_date'            => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});