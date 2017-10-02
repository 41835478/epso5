<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sections: defaults
    |--------------------------------------------------------------------------
    */
    'info'              => 'Información edafológica (suelo)',
    'title'             => 'Edafológica',
    'title:plural'      => 'Edafológicos',

    /*
    |--------------------------------------------------------------------------
    | Sections: Sample
    |--------------------------------------------------------------------------
    */
    'sample' => [
        'aggregate'             => 'Estabilidad agregados (%)',
        'aggregate:min'         => 'Agreg',
        'clay'                  => 'Arcilla (%)',
        'clay:min'              => 'Arcilla',
        'carbonate'             => 'CaCO3 Equivalente (%)',
        'carbonate:min'         => 'CaCO3',
        'cation_exchange'       => 'Intercambio Catiónico (meq/100g)',
        'cation_exchange:min'   => 'CIC',
        'coarse'                => 'Elementos gruesos',
        'coarse:min'            => 'EGr',
        'electric'              => 'Cond. Eléctrica (dS/m)',
        'electric:min'          => 'CE',
        'lime'                  => 'Caliza activa (%)',
        'lime:min'              => 'Cal',
        'name'                  => trans('persona.name'),
        'sand'                  => 'Arena (%)',
        'sand:min'              => 'Arena',
        'silt'                  => 'Limo (%)',
        'silt:min'              => 'Limo',
        'texture'               => 'Textura',
        'texture:min'           => 'Textura',
        'title'                 => 'Muestra',
        'type' => [
            1 => 'Primaria',
            2 => 'Secundaria',
        ],
        'organic_carbon'        => 'Carbono Orgánico (%)',
        'organic_carbon:min'    => 'COrg',
        'organic_matter'        => 'M.O. Total (%)',
        'organic_matter:min'    => 'MOrg',
        'ph'                    => 'pH',
    ],
];