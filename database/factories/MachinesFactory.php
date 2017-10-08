<?php

use App\Repositories\Machines\Machine;
use App\Repositories\Users\User;

/*
|--------------------------------------------------------------------------
| Factory for Machine
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Machine::class, function (Faker\Generator $faker) {
    $user = User::inRandomOrder()->first();
    return [
        'client_id'                     => $user->client_id,
        'user_id'                       => $user->id,
        'machine_equipment_name'        => $faker->company,
        'machine_brand'                 => $faker->company,
        'machine_model'                 => $faker->company,
        'machine_date'                  => $faker->date($format = 'd/m/Y', $max = 'now'),
        'machine_inspection'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'machine_next_inspection'       => random_array([15, 30, 60, 90, 180, 365]),
        'machine_observations'          => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});