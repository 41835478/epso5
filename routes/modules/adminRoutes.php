<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'middleware'    => 'role:admin'
    ], function () {
        Route::resource('cities', 'Dashboard\Admin\CitiesController', ['except' => 'destroy', 'show']);
        Route::resource('clients', 'Dashboard\Admin\ClientsController', ['except' => 'destroy', 'show']);
        Route::resource('crops', 'Dashboard\Admin\CropsController', ['except' => 'destroy', 'show']);
});