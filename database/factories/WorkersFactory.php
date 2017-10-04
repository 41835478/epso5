<?php

use App\Repositories\Workers\Worker;

/*
|--------------------------------------------------------------------------
| Factory for Worker
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Worker::class, function (Faker\Generator $faker) {
    return [
        'user_id'                   => 1,
        'client_id'                 => 1,
        'worker_name'               => $faker->name,
        'worker_nif'                => $faker->swiftBicNumber,
        'worker_ropo'               => $faker->swiftBicNumber,
        'worker_ropo_date'          => $faker->date($format = 'd/m/Y', $max = 'now'),
        'worker_ropo_level'         => rand(1, 4),
        'worker_start'              => $faker->date($format = 'd/m/Y', $max = 'now'),
        'worker_observations'       => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});