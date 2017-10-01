<?php

//Generate a custom button for search
$searchButton = Form::button(icon('search', trans('buttons.search')), [
    'class' => 'btn btn-success btn-sm',
]); 

return [

    /*
    |--------------------------------------------------------------------------
    | Geolocations
    |--------------------------------------------------------------------------
    */
    'aggregate'         => 'Agregado',
    'catastro'          => 'Catastro',
    'city'              => 'Ciudad',
    'country'           => 'País',
    'distance'          => 'Distancia',
    'precinct'          => 'Recinto',
    'lat'               => 'Latitud',
    'lat:min'           => 'Lat',
    'lng'               => 'Longitud',
    'lng:min'           => 'Lon',
    'plot'              => 'Parcela',
    'polygon'           => 'Polígono',
    'region'            => 'Provincia',
    'region:alt'        => 'Región',
    'state'             => 'Comunidad Autónoma',
    'state:min'         => 'CA',
    'zip'               => 'Código Postal',
    'zip:min'           => 'CP',
    'zone'              => 'Zona',

    /*
    |--------------------------------------------------------------------------
    | Form messages
    |--------------------------------------------------------------------------
    */
    'error' => 'Se ha producido un error interno. Estamos trabajando para solucionarlo. Por favor, copie el código que encontrará al final de este mensaje, y envíelo al email: <b>:email</b>',
    'new' => [
        'browse' => [
            1 => 'Navegue por el mapa hasta que encuentre su parcela.',
            2 => 'Haciendo doble click, o pulsando en el botón ' . '<b class="btn btn-secondary btn-sm">+</b>' . ' del mapa, aumentará el zoom.',
            3 => 'Una vez se acerque lo suficiente, el sistema le avisará de que la parcela está lista para ser añadida.',
        ],
        'city' => [
            1 => 'Empiece a escribir el nombre de la ciudad/municipio y el sistema le sugerirá resultados.',
            2 => 'Haga click, sobre la ciudad/municipio que está buscando.',
            3 => 'Pulse en el botón ' . $searchButton,
        ],
        'instructions'      => 'Haga click sobre la parcela a añadir, y aparecerá un marcador silimar al siguiente :icon',
        'instructions_next' => 'Una vez aparezca en el mapa, pulse en :icon',
        'ready'             => 'Seleccione su parcela',
        'add'               => 'Añadir Parcela',
    ],
    'submit' => [
        'error'             => 'Si se ha equivocado al seleccionar la parcela, vuelva a pinchar en el lugar correcto del mapa.',
        'confirm'           => 'Si la ubicación es la correcta, añada la parcela a su cuenta',
    ],
];