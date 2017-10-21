<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Form selects
    |--------------------------------------------------------------------------
    */
    'boolean' => [
        '1' => 'Activado',
        '0' => 'Descativado',
    ],

    'locale' => [
        'es' => 'Castellano',
        'en' => 'Inglés',
        'va' => 'Valenciano',
    ],

    'roles' => [
        'god'    => 'Super-Administrador',
        'admin'  => 'Administrador',
        'editor' => 'Editor',
        'user'   => 'Usuario',
    ],

    /*
    |--------------------------------------------------------------------------
    | Cultural Labors
    |--------------------------------------------------------------------------
    */
    'culturals' => [
        1   => 'Abonado de cobertera',
        2   => 'Abonado de fondo',
        3   => 'Aclarado de racimos',
        4   => 'Desbroce',
        5   => 'Incorporación de restos de poda',
        6   => 'Laboreo',
        7   => 'Poda',
        8   => 'Poda en verde',
        9   => 'Quema de poda autorizada',
        10  => 'Otros',
    ],

    /*
    |--------------------------------------------------------------------------
    | Cultural Labors
    |--------------------------------------------------------------------------
    */
    'fertilizer' => [
        1   => 'Orgánico',
        2   => 'Inorgánico',
    ],

    /*
    |--------------------------------------------------------------------------
    | Organic Fertilizers
    |--------------------------------------------------------------------------
    */
    'organics' => [
        1  => 'Abono verde',
        2  => 'Cenizas',
        3  => 'Compost',
        4  => 'Estiércol de bovino',
        5  => 'Estiércol de ovino',
        6  => 'Estiércol de caprino',
        7  => 'Estiércol de porcino',
        8  => 'Gallinaza, guano, etc...',
        9  => 'Humus de lombriz',
        10 => 'Otros',
    ],

    /*
    |--------------------------------------------------------------------------
    | Machines and automoviles (Inspection intervals)
    |--------------------------------------------------------------------------
    */
    'inspection' => [
        15   => '15 ' . strtolower(trans('dates.day:plural')), 
        30   => '1 ' . strtolower(trans('dates.month')), 
        90   => '3 ' . strtolower(trans('dates.month:plural')), 
        180  => '6 ' . strtolower(trans('dates.month:plural')), 
        365  => '1 ' . strtolower(trans('dates.year')), 
        730  => '2 ' . strtolower(trans('dates.year:plural')), 
        1095 => '3 ' . strtolower(trans('dates.year:plural')), 
        1460 => '4 ' . strtolower(trans('dates.year:plural')), 
        1825 => '5 ' . strtolower(trans('dates.year:plural')), 
    ],
];