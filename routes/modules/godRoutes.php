<?php

/** God Routes */
Route::group([
        'as'            => 'god.', 
        'middleware'    => 'role:god'
    ], function () {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('errors');
        //Application 
        Route::get('administrations/edit', 'Dashboard\God\AdministrationsController@edit')->name('administrations.edit');
        Route::get('administrations/update', 'Dashboard\God\AdministrationsController@update')->name('administrations.update');
});