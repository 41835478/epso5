<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'middleware'    => 'role:admin'
    ], function () {
        //Biocides
        Route::resource('biocides', 'Dashboard\Admin\BiocidesController', ['except' => ['destroy', 'show']]);
        Route::get('biocides/tools/index', 'Dashboard\Admin\BiocidesToolsController@index')->name('biocides.tools');
        Route::post('biocides/tools/store', 'Dashboard\Admin\BiocidesToolsController@store')->name('biocides.tools.store');
        //Cities
        Route::resource('cities', 'Dashboard\Admin\CitiesController', ['except' => ['destroy', 'show']]);
        //Clients
        Route::resource('clients', 'Dashboard\Admin\ClientsController', ['except' => ['destroy', 'show']]);
        //Crops
        Route::resource('crops', 'Dashboard\Admin\CropsController', ['except' => ['destroy', 'show']]);
        Route::resource('crop_varieties', 'Dashboard\Admin\CropVarietiesController', ['except' => ['index', 'destroy', 'edit']]);
        Route::get('crop_varieties/edit/{crop_variety}/{crop}', 'Dashboard\Admin\CropVarietiesController@edit')->name('crop_varieties.edit');
        Route::resource('crop_variety_types', 'Dashboard\Admin\CropVarietyTypesController', ['except' => ['index', 'destroy', 'edit']]);
        //Patterns
        Route::resource('patterns', 'Dashboard\Admin\PatternsController', ['except' => ['destroy', 'index']]);
        //Pests
        Route::resource('pests', 'Dashboard\Admin\PestsController', ['except' => ['destroy', 'index']]);
});