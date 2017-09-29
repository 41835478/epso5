<?php

use App\Repositories\Edaphologies\Edaphology;

/*
|--------------------------------------------------------------------------
| Factory for Edaphology
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Edaphology::class, function (Faker\Generator $faker) {
    return [
        'edaphology_name'            => $faker->company,
        // 'edaphology_word'            => $faker->word,
        // 'edaphology_words'           => $faker->words($nb = 3, $asText = false),
        // 'edaphology_email'           => $faker->unique()->safeEmail,
        // 'edaphology_description'     => $faker->sentence($nbWords = 10, $variableNbWords = true),
        // 'edaphology_phone'           => $faker->tollFreePhoneNumber,
        // 'edaphology_reference'       => $faker->shuffle('ABCDEF0123456789'),
        // 'edaphology_lat'             => $faker->latitude($min = -90, $max = 90),
        // 'edaphology_lng'             => $faker->longitude($min = -180, $max = 180),
        // 'edaphology_web'             => $faker->url,
        // 'edaphology_number'          => $faker->swiftBicNumber,
        // 'edaphology_randon_num'      => $faker->randomNumber($nbDigits = 4, $strict = false),
        // 'edaphology_zip'             => $faker->postcode,
        // 'edaphology_google'          => $faker->unique()->userName . '@gmail.com',
        // 'edaphology_linkedin'        => 'http://linkedin.com/' . $faker->slug,
        // 'edaphology_twitter'         => '@' . $faker->unique()->userName,
        // 'edaphology_facebook'        => 'http://www.facebook.com/user/' . $faker->slug,
        // 'edaphology_date'            => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});