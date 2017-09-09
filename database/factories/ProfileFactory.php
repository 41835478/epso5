<?php

use App\Repositories\Profiles\Profile;
use App\Repositories\Users\User;

/*
|--------------------------------------------------------------------------
| Factory for profiles
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Profile::class, function (Faker\Generator $faker) {
    return [
        'profile_address'           => $faker->address,        
        'profile_birthdate'         => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now')->format('m/d/Y'),
        'profile_city'              => $faker->city,
        'profile_country'           => $faker->country,
        'profile_region'            => $faker->state,
        'profile_social_google'     => $faker->unique()->userName . '@gmail.com',
        'profile_social_linkedin'   => 'http://linkedin.com/' . $faker->slug,
        'profile_social_twitter'    => '@' . $faker->unique()->userName,
        'profile_social_facebook'   => 'http://www.facebook.com/user/' . $faker->slug,
        'profile_state'             =>  $faker->state,
        'profile_telephone'         =>  $faker->randomNumber(9),
        'profile_url'               =>  $faker->url,
        'profile_zip'               =>  $faker->randomNumber(5),
    ];
});