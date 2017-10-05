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
    ],

    'months' => [
        1 => 'Enero', 
        2 => 'Febrero', 
        3 => 'Marzo', 
        4 => 'Abril', 
        5 => 'Mayo', 
        6 => 'Junio', 
        7 => 'Julio', 
        8 => 'Agosto', 
        9 => 'Septiembre', 
        10 => 'Octubre', 
        11 => 'Noviembre', 
        12 => 'Diciembre',
    ],

    'roles' => [
        'god'       => 'Super-Administrador',
        'admin'     => 'Administrador',
        'editor'    => 'Editor',
        'user'      => 'Usuario',
    ],

    'week' => [
        1 => 'Lunes', 
        2 => 'Martes', 
        3 => 'Miércoles', 
        4 => 'Jueves', 
        5 => 'Viernes', 
        6 => 'Sábado', 
        7 => 'Domingo',
    ],

    'inspection' => [
        15      => '15 ' . strtolower(trans('dates.day:plural')), 
        30      => '1 ' . strtolower(trans('dates.month')), 
        90      => '3 ' . strtolower(trans('dates.month:plural')), 
        180     => '6 ' . strtolower(trans('dates.month:plural')), 
        365     => '1 ' . strtolower(trans('dates.year')), 
        730     => '2 ' . strtolower(trans('dates.year:plural')), 
        1095    => '3 ' . strtolower(trans('dates.year:plural')), 
        1460    => '4 ' . strtolower(trans('dates.year:plural')), 
        1825    => '5 ' . strtolower(trans('dates.year:plural')), 
    ]
];