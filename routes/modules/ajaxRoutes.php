<?php 

/** Ajax Routes */
Route::group([
        'as' => 'ajax.', 
    ], function () {
        Route::get('ajax/regions', 'Dashboard\Ajax\RegionsController')->name('regions');  
});