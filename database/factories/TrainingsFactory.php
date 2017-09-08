<?php

use App\Repositories\Trainings\Training;

/*
|--------------------------------------------------------------------------
| Users and Profile Factories
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Training::class, function (Faker\Generator $faker) {
    return [
        'training_name'           => $faker->company,
        'training_description'    => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});