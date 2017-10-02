<?php

/** User Routes */
Route::group([
        'as'            => 'user.', 
        'middleware'    => 'role:user'
    ], function () {
        //Edaphologies 
        Route::resource('edaphologies', 'Dashboard\EdaphologiesController', ['only' => ['show']]);
        Route::get('edaphologies/download/{id}', 'Dashboard\EdaphologiesDownloadController')->name('edaphologies.download');
        //Routes for the GOD tools
        Route::get('tools/role/{id}', 'Dashboard\God\ToolsController@role')->name('tools.role');

        //Users. Eliminate is in editor routes.
        Route::resource('users', 'Dashboard\UsersController', ['except' => ['destroy', 'show']]); 

        //Plots
        Route::resource('plots', 'Dashboard\PlotsController', ['except' => ['destroy', 'show']]); 
        Route::post('plots/configurate', 'Dashboard\PlotsConfigurateController@configurate')->name('plots.configurate');
        Route::post('plots/eliminate', 'Dashboard\PlotsController@eliminate')->name('plots.eliminate');
        //Only for testing
        if (isset(explode('.', gethostname())[1]) && explode('.', gethostname())[1] === 'local') {
            Route::get('plots/test', 'Dashboard\PlotsConfigurateController@configurate')->name('plots.test');
        }
});