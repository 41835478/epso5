<?php

/** God Routes */
Route::group([
        'as'            => 'god.', 
        'middleware'    => 'role:god'
    ], function () {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('errors');
});