<?php

use App\Repositories\Clients\Client;

/*
|--------------------------------------------------------------------------
| Factory for Clients
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Client::class, function (Faker\Generator $faker) {
    return [
        'client_name'       => $faker->company,
        'client_email'      => $faker->unique()->safeEmail,
        'client_nif'        => generate_password(),
        'client_zip'        => $faker->randomNumber(5),
        'client_contact'    => $faker->name,
        'client_address'    => $faker->streetAddress,
        'client_city'       => $faker->city,
        'client_country'    => $faker->country,
        'client_region'     => $faker->state,
        'client_state'      => $faker->state,
        'client_web'        => $faker->url,
        'client_telephone'  => $faker->tollFreePhoneNumber,
    ];
});