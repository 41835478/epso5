<?php

/** User Routes */
Route::group([
        'as'            => 'user.', 
        'middleware'    => 'role:user'
    ], function () {
        //Routes for the GOD tools
        Route::get('tools/role/{id}', 'Dashboard\God\ToolsController@role')->name('tools.role');

        //Users. Eliminate is in editor routes.
        Route::resource('users', 'Dashboard\UsersController', ['except' => ['destroy', 'show']]); 

        //Plots
        Route::resource('plots', 'Dashboard\PlotsController', ['except' => ['destroy', 'show']]); 
        Route::get('plots/test', 'Dashboard\PlotsConfigurateController@configurate')->name('plots.test');
        Route::post('plots/configurate', 'Dashboard\PlotsConfigurateController@configurate')->name('plots.configurate');
        Route::post('plots/eliminate', 'Dashboard\PlotsController@eliminate')->name('plots.eliminate');
});