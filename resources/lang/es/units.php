<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General lines
    |--------------------------------------------------------------------------
    */
    'area'              => 'Superficie',
    'area:alt'          => 'Sup. cultivada',
    'm2'                => 'Superficie en m<sup>2</sup>',
    'm2:min'            => 'm<sup>2</sup>',
    'percent'           => 'Porcentaje de suelo cultivado', //Percent of cultivated land
    'percent:alt'       => 'Suelo cultivado', //Percent of cultivated land
    'percent:min'       => '%', //Percent of cultivated land
    'quantity'          => 'Cantidad',
    'title'             => 'Unidad',
    'title:plural'      => 'Unidades',
    'title:mix'         => 'Unidad(es)',

     /*
     |--------------------------------------------------------------------------
     | Units
     |--------------------------------------------------------------------------
     */
    'selects' => [
        'harvests' => [
             1   => 'kg/ha',
             2   => 'l/ha',
             3   => 'm3/ha',
        ],
        'irrigations' => [
             1   => 'l/ha',
             2   => 'm3/ha',
        ],
    ],
];