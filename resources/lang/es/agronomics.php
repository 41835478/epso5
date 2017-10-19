<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Agronomics
    |--------------------------------------------------------------------------
    */
    'acidity'                   => 'Ac T',
    'acidity_extended'          => 'Acidez Total',
    'anthocyanin'               => 'Ant T',
    'anthocyanin_extended'      => 'Antocianos Totales',
    'anthocyanin_e'             => 'Ant Ext',
    'anthocyanin_e_extended'    => 'Antocianos Extraibles',
    'baume'                     => 'ºB',
    'baume_extended'            => 'Grados Baume',
    'baume_kg'                  => 'Kilogrado',
    'ph'                        => 'pH',
    'poliphenol'                => 'Polif T',
    'poliphenol_extended'       => 'Polifenoles Totales',

    /*
    |--------------------------------------------------------------------------
    | Organic Fertilizers
    |--------------------------------------------------------------------------
    */
    'organics' => [
        1                   => 'Abono verde',
        2                   => 'Cenizas',
        3                   => 'Compost',
        4                   => 'Estiércol de bovino',
        5                   => 'Estiércol de ovino',
        6                   => 'Estiércol de caprino',
        7                   => 'Estiércol de porcino',
        8                   => 'Gallinaza, guano, etc...',
        9                   => 'Humus de lombriz',
        10                  => 'Otros',
    ],

    /*
    |--------------------------------------------------------------------------
    | Cultural Labors
    | NOTA: Solo cambiar el texto de la etiqueta 'title', el de la etiqueta 'form'
    | no se tiene que cambiar!!!!! Muy importante!!!!!!
    |--------------------------------------------------------------------------
    */
    'culturals' => [
        1                   => ['title' => 'Abonado de cobertera',                 'form' => 'fertilizer'],
        2                   => ['title' => 'Abonado de fondo',                     'form' => 'fertilizer'],
        3                   => ['title' => 'Aclarado de racimos',                  'form' => ''],
        4                   => ['title' => 'Desbroce',                             'form' => ''],
        5                   => ['title' => 'Incorporación de restos de poda',      'form' => 'quantity'],
        6                   => ['title' => 'Laboreo',                              'form' => ''],
        7                   => ['title' => 'Poda',                                 'form' => 'quantity'],
        8                   => ['title' => 'Poda en verde',                        'form' => 'quantity'],
        9                   => ['title' => 'Quema de poda autorizada',             'form' => ''],
        10                  => ['title' => 'Otros',                                'form' => ''],
    ],
];
