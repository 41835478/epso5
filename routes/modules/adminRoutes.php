<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'middleware'    => 'role:admin'
    ], function () {
        //Biocides
        Route::resource('biocides', 'Dashboard\Admin\BiocidesController', ['except' => 'destroy', 'show']);
        //Cities
        Route::resource('cities', 'Dashboard\Admin\CitiesController', ['except' => 'destroy', 'show']);
        //Clients
        Route::resource('clients', 'Dashboard\Admin\ClientsController', ['except' => 'destroy', 'show']);
        //Crops
        Route::resource('crops', 'Dashboard\Admin\CropsController', ['except' => 'destroy', 'show']);
        //Route::post('crops/eliminate', 'Dashboard\Admin\CropsController@eliminate')->name('crops.eliminate');
});