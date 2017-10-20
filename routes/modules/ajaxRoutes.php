<?php 

/** Ajax Routes */
Route::group([
        'as' => 'ajax.', 
    ], function () {
        Route::get('ajax/modules', 'Dashboard\Ajax\ModulesController')->name('modules');  
        Route::get('ajax/modules/load', 'Dashboard\Ajax\ModulesLoadController')->name('modules.load');  
        Route::get('ajax/harvests', 'Dashboard\Ajax\HarvestsController')->name('harvests');
        Route::get('ajax/biocides', 'Dashboard\Ajax\BiocidesController')->name('biocides');    
        Route::get('ajax/cities', 'Dashboard\Ajax\CitiesController')->name('cities');  
        Route::get('ajax/crops', 'Dashboard\Ajax\CropsController')->name('crops');  
        Route::get('ajax/pests', 'Dashboard\Ajax\PestsController')->name('pests');  
        Route::get('ajax/plots', 'Dashboard\Ajax\PlotsController')->name('plots');  
        Route::get('ajax/regions', 'Dashboard\Ajax\RegionsController')->name('regions');  
        Route::get('ajax/users', 'Dashboard\Ajax\UsersController')->name('users'); 
        Route::get('ajax/varieties', 'Dashboard\Ajax\CropVarietiesController')->name('varieties');  
        Route::get('ajax/workers', 'Dashboard\Ajax\WorkersController')->name('workers');  
});