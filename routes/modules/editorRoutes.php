<?php 

/** Editor Routes */
Route::group([
        'as'            => 'editor.', 
        'middleware'    => 'role:editor'
    ], function () {
        //Plots
        Route::post('plots/assign', 'Dashboard\Editor\PlotsAssignController')->name('plots.assign');
        //Users,delete a/an user/s
        Route::post('users/eliminate', 'Dashboard\UsersController@eliminate')->name('users.eliminate');
});