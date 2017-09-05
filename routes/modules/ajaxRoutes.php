<?php 

/** Ajax Routes */
Route::group([
        'as' => 'ajax.', 
    ], function () {
        Route::get('ajax/regions', 'Dashboard\Ajax\RegionsController')->name('regions');  
        Route::get('ajax/cropVarietyTypes', 'Dashboard\Ajax\CropVarietyTypesController')->name('cropVarietyTypes');  
});