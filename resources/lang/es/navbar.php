<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Navbar Menus: Admin
    |--------------------------------------------------------------------------
    */
    'admin' => 'Administración',
        'admin:clients'             => 'Clientes',
        'admin:climatic_stations'   => 'Estaciones meteorológicas',
        'admin:climatics'           => 'Datos climáticos',
        'admin:config'              => 'Configuración',
        'admin:countries'           => 'Ciudades',
        'admin:crops'               => 'Cultivos',
        'admin:biocides'            => 'Fitosanitarios',
        'admin:irrigation'          => 'Riegos',
        'admin:training'            => 'Conducciones',
        'admin:errors'              => 'Gestión de errores',
        'admin:administration'      => 'Administración',
    /*
    |--------------------------------------------------------------------------
    | Navbar Menus: Users
    |--------------------------------------------------------------------------
    */
    'users' => trans('auth.user:plural'),
    /*
    |--------------------------------------------------------------------------
    | Navbar Menus: Agronomics
    |--------------------------------------------------------------------------
    */
   'agronomics' => 'Agrícola',
        'agronomics:harvests'       => 'Cosecha/Vendimia',
        'agronomics:incidents'      => 'Incidentes',
        'agronomics:biocides'       => 'Fitosanitarios',
        'agronomics:culturals'      => 'Labores culturales',
        'agronomics:pests'          => 'Plagas',
        'agronomics:irrigations'    => 'Riegos',
     /*
     |--------------------------------------------------------------------------
     | Navbar Menus: Agronomics
     |--------------------------------------------------------------------------
     */
    'plots' => trans_title('plots'),
        'plots:assign'    => 'Asignar',
        'plots:list'      => 'Listado',
        'plots:new'       => 'Nueva',

     /*
     |--------------------------------------------------------------------------
     | Navbar Menus: Equipment
     |--------------------------------------------------------------------------
     */
    'equipment' => 'Maquinaria',

     /*
     |--------------------------------------------------------------------------
     | Navbar Menus: Workers
     |--------------------------------------------------------------------------
     */
    'workers' => 'Trabajadores',

     /*
     |--------------------------------------------------------------------------
     | Navbar Menus: Tools
     |--------------------------------------------------------------------------
     */
    'tools' => 'Herramientas',
        'tools:roles:title'  => 'Cambio de role',
];