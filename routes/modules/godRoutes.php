<?php

/** God Routes */
Route::group([
        'as'            => 'god.', 
        'middleware'    => 'role:god'
    ], function () {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('errors');
        //Application 
        Route::get('hosting/edit', 'Dashboard\God\HostingsController@edit')->name('hosting.edit');
        Route::get('hosting/update', 'Dashboard\God\HostingsController@update')->name('hosting.update');
});