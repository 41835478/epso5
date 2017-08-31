<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'prefix'        => 'admin',
        'middleware'    => 'role:admin'
    ], function () {
        //
});