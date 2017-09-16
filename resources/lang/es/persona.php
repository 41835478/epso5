<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ID values
    |--------------------------------------------------------------------------
    */
    'id' => [
        'cif'               => 'C.I.F.',
        'dni'               => 'D.N.I.',
        'driver'            => 'Permiso conductor',
        'nif'               => 'N.I.F.',
        'passport'          => 'Pasaporte',
    ],

    /*
    |--------------------------------------------------------------------------
    | Personal values
    |--------------------------------------------------------------------------
    */
   
    'address'           => 'Dirección',
    'birthdate'         => 'Nacimiento',
    'city'              => trans('geolocations.city'),
    'color'             => 'Color',
    'contact'           => 'Contacto',
    'country'           => trans('geolocations.country'),
    'email'             => 'Email',
    'fax'               => 'Fax',
    'image'             => 'Imagen',
    'locale'            => 'Idioma',
    'lat'               => trans('geolocations.lat'),
    'lng'               => trans('geolocations.lng'),
    'logotype'          => 'Logotipo',
    'name'              => 'Nombre',
    'region'            => trans('geolocations.region'),
    'role'              => 'Nivel',
    'signature'         => 'Firma',
    'state'             => trans('geolocations.state'),
    'state:min'         => trans('geolocations.state:min'),
    'surname'           => 'Apellidos',
    'telephone'         => 'Teléfono',
    'website'           => 'Página web',
    'zip'               => trans('geolocations.zip'),
    'zip:min'           => trans('geolocations.zip:min'),
];