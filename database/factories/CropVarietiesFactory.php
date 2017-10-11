<?php

use App\Repositories\CropVarieties\CropVariety;

/*
|--------------------------------------------------------------------------
| Factory for CropVariety
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(CropVariety::class, function (Faker\Generator $faker) {
    $crop   = rand(1, 2);
    $type   = rand(0, 1);

    return [
        'crop_id'               => $crop,
        'crop_variety_name'     => $faker->words($nb = 3, $asText = true),
        'crop_variety_type'     => ($crop == 1) ? $type : null,
    ];
});