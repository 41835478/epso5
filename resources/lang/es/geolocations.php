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
    'aggregate'          => 'Agregado',
    'city'              => 'Ciudad',
    'country'           => 'País',
    'distance'          => 'Distancia',
    'precinct'          => 'Recinto',
    'lat'               => 'Latitud',
    'lng'               => 'Longitud',
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
        'instructions'      => 'Haga click sobre la parcela, y aparecerá un marcador como este',
        'instructions_next' => 'Una vez aparezca en el mapa, pulse en el botón similar a este',
        'ready'             => 'Ya puede añadir su parcela',
        'add'               => 'Añadir Parcela',
    ],
    'submit' => [
        'error'             => 'Si se ha equivocado al seleccionar la parcela, vuelva a pinchar en el lugar correcto del mapa.',
        'confirm'           => 'Si la ubicación es la correcta, añada la parcela a su cuenta',
    ],
];