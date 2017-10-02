<?php

use App\Repositories\Edaphologies\Edaphology;

/*
|--------------------------------------------------------------------------
| Factory for Edaphology
    Sera necesario eliminar el seeder de las parcelas y crearlos desde aqui, como los perfiles
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Edaphology::class, function (Faker\Generator $faker) {
    
    $percentByPart[1]   = rand(10, 38);
    $percentByPart[2]   = rand(1, (100 - $percentByPart[1]));
    $percentByPart[3]   = 100 - $percentByPart[1] - $percentByPart[2];
    $textures           = ['Arenoso', 'Franco arenoso', 'Franco limoso', 'Franco arenoso arcilloso', 'Arcilloso arenoso', 'Franco'];

    return [
        'plot_id'                                   => 1,
        'client_id'                                 => 1,
        'crop_id'                                   => 1,
        'edaphology_level'                          => rand(1, 2),
        'edaphology_lat'                            => $faker->latitude($min = 38, $max = 39),
        'edaphology_lng'                            => $faker->longitude($min = -0.94, $max = -0.95),
        'edaphology_name'                           => $faker->words($nb = 3, $asText = true),
        'edaphology_reference'                      => $faker->swiftBicNumber,
        'edaphology_observations'                   => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'edaphology_aggregate_stability'            => rand(1, 100),
        'edaphology_coarse_elements'                => rand(1, 100),
        'edaphology_sand'                           => $percentByPart[1],
        'edaphology_silt'                           => $percentByPart[2],
        'edaphology_clay'                           => $percentByPart[3],
        'edaphology_ph'                             => rand(1, 14),
        'edaphology_electric_conductivity'          => rand(100, 2500),
        'edaphology_calcium_carbonate_equivalent'   => rand(1, 100),
        'edaphology_active_lime'                    => rand(1, 100),
        'edaphology_total_organic_matter'           => rand(1, 100),
        'edaphology_organic_carbon'                 => rand(1, 100),
        'edaphology_cation_exchange'                => rand(1, 100),
        'edaphology_texture'                        => random_array($textures),
    ];
});