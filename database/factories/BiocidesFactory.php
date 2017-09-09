<?php

use App\Repositories\Biocides\Biocide;

/*
|--------------------------------------------------------------------------
| Factory for Biocides
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Biocide::class, function (Faker\Generator $faker) {
    return [
        'biocide_num'           => $faker->shuffle('ABCDEF0123456789'),
        'biocide_name'          => $faker->company . '-' .$faker->shuffle('aBcDeFgHiJk#_123456789'),
        'biocide_company'       => $faker->catchPhrase,
        'biocide_formula'       => $faker->phoneNumber,
    ];
});