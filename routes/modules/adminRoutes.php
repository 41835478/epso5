<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'prefix'        => 'admin',
        'middleware'    => 'role:admin'
    ], function () {
        Route::resource('cities', 'CitiesController', ['except' => 'show']);
});