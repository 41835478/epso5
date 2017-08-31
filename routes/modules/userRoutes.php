<?php

/** User Routes */
Route::group([
        'as'            => 'user.', 
        'middleware'    => 'role:user'
    ], function () {
        //Routes for the GOD tools
        Route::get('tools/role/{id}', 'Dashboard\God\ToolsController@role')->name('tools.role');

        //Users routes, the destroy, create or list options are in the editorRoutes.php
        Route::resource('users', 'Dashboard\UsersController', ['except' => ['destroy', 'show']]); 
        Route::name('users.eliminate')->post('users/eliminate', 'Dashboard\UsersController@eliminate'); 
});