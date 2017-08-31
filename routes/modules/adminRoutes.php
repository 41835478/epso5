<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'middleware'    => 'role:admin'
    ], function () {
        Route::resource('cities', 'Dashboard\Admin\CitiesController', ['except' => 'show']);
        Route::resource('clients', 'Dashboard\Admin\ClientsController', ['except' => 'show']);
});