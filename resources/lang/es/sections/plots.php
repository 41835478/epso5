<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sections: plots
    |--------------------------------------------------------------------------
    */
    'assign'            => 'Listado de parcelas sin usuario',
    'date'              => sections('crops.date'),
    'framework'         => 'Marco de plantación',
    'framework:min'     => 'Marco',
    'framework:x'       => 'Separación entre líneas',
    'framework:y'       => 'Distancia entre cepas',
    'loading'           => icon('alert') . ' Seleccione un cliente para cargar el módulo de cultivo',
    'pattern'           => sections('patterns.title'),
    'percent'           => trans('units.percent:alt'),
    'quantity'          => sections('crops.quantity'),
    'title'             => 'Parcela',
    'title:plural'      => 'Parcelas',
    'training'          => sections('trainings.title'),
    'type'              => sections('crop_variety_types.title'),

    /*
    |--------------------------------------------------------------------------
    | Legends
    |--------------------------------------------------------------------------
    */
   'administration'    => 'Datos de configuración: Para los nives administrador y editor',
   'crop'              => 'Información del cultivo',
   'geolocation'       => 'Datos de geolocalización',
   'geolocation:alert' => '¿Son correctos los siguientes datos del SIGPAC? Si no lo son, por favor, modifíquelos.', 
   'plot'              => 'Información de la parcela',
];