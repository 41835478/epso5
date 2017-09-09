<?php

use App\Repositories\Crops\Crop;

/*
|--------------------------------------------------------------------------
| Factory for crops
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Crop::class, function (Faker\Generator $faker) {
    $crops = implode(' ', $faker->words);
    
    return [
        'crop_name'         => $crops,
        'crop_module'       => str_slug(str_limit($crops, 20)),
        'crop_description'  => $faker->sentence,
    ];
});