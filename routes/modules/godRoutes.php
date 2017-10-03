<?php

/** God Routes */
Route::group([
        'as'            => 'god.', 
        'middleware'    => 'role:god'
    ], function () {
        //Administrations 
        Route::resource('administrations', 'Dashboard\God\AdministrationsController', ['only' => ['edit', 'update']]);
        //Logs
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('errors');
});