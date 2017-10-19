<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General lines
    |--------------------------------------------------------------------------
    */
    'acidity'           => 'g/l tart',
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
        'biocides' => [
             1   => 'kg/ha',
             2   => 'm3/ha',
             3   => 'l/ha',
             4   => 'g/l',
             5   => 'mg/l',
        ],
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