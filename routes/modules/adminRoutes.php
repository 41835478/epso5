<?php

/** Admin Routes */
Route::group([
        'as'            => 'admin.', 
        'middleware'    => 'role:admin'
    ], function () {
        //Testing
        Route::get('test', 'Dashboard\TestController')->name('test');

        //Biocides
        Route::resource('biocides', 'Dashboard\Admin\BiocidesController', ['except' => ['destroy', 'show']]);
        Route::get('biocides/tools/index', 'Dashboard\Admin\BiocidesToolsController@index')->name('biocides.tools');
        Route::post('biocides/tools/store', 'Dashboard\Admin\BiocidesToolsController@store')->name('biocides.tools.store');
        //Cities
        Route::resource('cities', 'Dashboard\Admin\CitiesController', ['except' => ['destroy', 'show']]);
        //Clients
        Route::resource('clients', 'Dashboard\Admin\ClientsController', ['except' => ['destroy', 'show']]);
        //Climatics
        Route::resource('climatics', 'Dashboard\Admin\ClimaticsController', ['except' => ['destroy', 'show']]);
        Route::resource('climatic_stations', 'Dashboard\Admin\ClimaticStationsController', ['except' => ['destroy', 'show']]);
        Route::get('climatic_stations/active', 'Dashboard\Admin\ClimaticStationsActivesController')->name('climatic_stations.active');
        //Configs
        Route::resource('configs', 'Dashboard\Admin\ConfigsController', ['except' => ['destroy', 'show']]);
        //Crops
        Route::resource('crops', 'Dashboard\Admin\CropsController', ['except' => ['destroy', 'show']]);
        Route::resource('crop_varieties', 'Dashboard\Admin\CropVarietiesController', ['except' => ['index', 'destroy', 'edit']]);
        Route::post('crop_varieties/eliminate', 'Dashboard\Admin\CropVarietiesController@eliminate')->name('crop_varieties.eliminate');
            //Because we need to include the crop variety types... look inside the controller!!!
            Route::get('crop_varieties/edit/{crop_variety}/{crop}', 'Dashboard\Admin\CropVarietiesController@edit')->name('crop_varieties.edit');
        Route::resource('crop_variety_types', 'Dashboard\Admin\CropVarietyTypesController', ['only' => ['create', 'store']]);
        //Edaphologies 
        Route::resource('edaphologies', 'Dashboard\EdaphologiesController', ['only' => ['create', 'store', 'edit', 'update']]);
        Route::post('edaphologies/eliminate', 'Dashboard\EdaphologiesController@eliminate')->name('edaphologies.eliminate');
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