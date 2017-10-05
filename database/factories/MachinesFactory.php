<?php

use App\Repositories\Machines\Machine;

/*
|--------------------------------------------------------------------------
| Factory for Machine
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Machine::class, function (Faker\Generator $faker) {
    return [
        'user_id'                       => rand(1, 10),
        'machine_equipment_name'        => $faker->company,
        'machine_brand'                 => $faker->company,
        'machine_model'                 => $faker->company,
        'machine_date'                  => $faker->date($format = 'd/m/Y', $max = 'now'),
        'machine_inspection'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'machine_next_inspection'       => rand(15, 3000),
        'machine_observations'          => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});