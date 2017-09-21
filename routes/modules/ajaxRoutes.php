<?php 

/** Ajax Routes */
Route::group([
        'as' => 'ajax.', 
    ], function () {
        Route::get('ajax/cropVarietyTypes', 'Dashboard\Ajax\CropVarietyTypesController')->name('cropVarietyTypes');  
        Route::get('ajax/modules', 'Dashboard\Ajax\ModulesController')->name('modules');  
        Route::get('ajax/modules/load', 'Dashboard\Ajax\ModulesLoadController')->name('modules.load');  
        Route::get('ajax/cities', 'Dashboard\Ajax\CitiesController')->name('cities');  
        Route::get('ajax/regions', 'Dashboard\Ajax\RegionsController')->name('regions');  
        Route::get('ajax/users', 'Dashboard\Ajax\UsersController')->name('users'); 
        Route::get('ajax/varieties', 'Dashboard\Ajax\CropVarietiesController')->name('varieties');  
});