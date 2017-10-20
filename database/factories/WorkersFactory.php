<?php

use App\Repositories\Users\User;
use App\Repositories\Workers\Worker;

/*
|--------------------------------------------------------------------------
| Factory for Worker
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Worker::class, function (Faker\Generator $faker) {
    $user = User::inRandomOrder()->first();
    return [
        'user_id'                   => $user->id,
        'client_id'                 => $user->client_id,
        'worker_name'               => $faker->name,
        'worker_nif'                => $faker->swiftBicNumber,
        'worker_ropo'               => $faker->swiftBicNumber,
        'worker_ropo_date'          => $faker->date($format = 'd/m/Y', $max = 'now'),
        'worker_ropo_level'         => rand(1, 4),
        'worker_start'              => $faker->date($format = 'd/m/Y', $max = 'now'),
        'worker_observations'       => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});