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
    | NOTA: Solo cambiar el texto de la etiqueta 'title', el de la etiqueta 'form'
    | no se tiene que cambiar!!!!! Muy importante!!!!!!
    |--------------------------------------------------------------------------
    */
    'culturals' => [
        1  => ['title' => trans('agronomics.culturals.1'),    'form' => 'fertilizer'],
        2  => ['title' => trans('agronomics.culturals.2'),    'form' => 'fertilizer'],
        3  => ['title' => trans('agronomics.culturals.3'),    'form' => 'default'],
        4  => ['title' => trans('agronomics.culturals.4'),    'form' => 'default'],
        5  => ['title' => trans('agronomics.culturals.5'),    'form' => 'quantity'],
        6  => ['title' => trans('agronomics.culturals.6'),    'form' => 'default'],
        7  => ['title' => trans('agronomics.culturals.7'),    'form' => 'quantity'],
        8  => ['title' => trans('agronomics.culturals.8'),    'form' => 'quantity'],
        9  => ['title' => trans('agronomics.culturals.9'),    'form' => 'default'],
        10 => ['title' => trans('agronomics.culturals.10'),   'form' => 'default'],
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