<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'middleware'    => 'role:admin'
    ], function () {
        Route::resource('cities', 'Dashboard\Admin\CitiesController', ['except' => 'show']);
        Route::resource('clients', 'Dashboard\Admin\ClientsController', ['except' => 'show']);
        Route::post('admin/eliminate', 'Dashboard\Admin\ClientsController@eliminate')->name('clients.eliminate');
});