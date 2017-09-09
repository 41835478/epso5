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
        //Configs
        Route::resource('configs', 'Dashboard\Admin\ConfigsController', ['except' => ['destroy', 'show']]);
        //Crops
        Route::resource('crops', 'Dashboard\Admin\CropsController', ['except' => ['destroy', 'show']]);
        Route::resource('crop_varieties', 'Dashboard\Admin\CropVarietiesController', ['except' => ['index', 'destroy', 'edit']]);
        Route::get('crop_varieties/edit/{crop_variety}/{crop}', 'Dashboard\Admin\CropVarietiesController@edit')->name('crop_varieties.edit');
        Route::post('crop_variety_types', 'Dashboard\Admin\CropVarietyTypesController@store')->name('crop_variety_types.store');
        //Irrigations
        Route::resource('irrigations', 'Dashboard\Admin\IrrigationsController', ['except' => ['destroy', 'show']]);
        //Patterns
        Route::resource('patterns', 'Dashboard\Admin\PatternsController', ['except' => ['destroy', 'index']]);
        Route::post('patterns/eliminate', 'Dashboard\Admin\PatternsController@eliminate')->name('patterns.eliminate');
        //Pests
        Route::resource('pests', 'Dashboard\Admin\PestsController', ['except' => ['destroy', 'index']]);
        Route::post('pests/eliminate', 'Dashboard\Admin\PestsController@eliminate')->name('pests.eliminate');
        //Trainings
        Route::resource('trainings', 'Dashboard\Admin\TrainingsController', ['except' => ['destroy', 'show']]);
});