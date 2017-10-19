<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General lines
    |--------------------------------------------------------------------------
    */
    'area'              => 'Superficie',
    'area:alt'          => 'Sup. cultivada',
    'kg'                => 'Kg',
    'kg:ext'            => 'Kilogramos',
    'kg:ha'             => 'Kg/ha',
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
             1   => 'kg',
             2   => 'l',
             3   => 'm3',
        ],
        'irrigations' => [
             1   => 'l/ha',
             2   => 'm3/ha',
        ],
    ],
];