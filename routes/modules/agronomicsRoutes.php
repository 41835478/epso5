<?php

/** Agronomics Routes */
Route::group([
        'as'            => 'user.', 
        'middleware'    => 'role:user'
    ], function () {
        //Biocides
        Route::resource('agronomic_biocides', 'Dashboard\Agronomic\AgronomicBiocidesController', ['except' => ['destroy', 'show']]); 
        Route::post('agronomic_biocides/eliminate', 'Dashboard\Agronomic\AgronomicBiocidesController@eliminate')->name('agronomic_biocides.eliminate');
        //Culturals
        Route::resource('agronomic_culturals', 'Dashboard\Agronomic\AgronomicCulturalsController', ['except' => ['destroy', 'show']]); 
        Route::post('agronomic_culturals/eliminate', 'Dashboard\Agronomic\AgronomicCulturalsController@eliminate')->name('agronomic_culturals.eliminate');
        //Harvests
        Route::resource('agronomic_harvests', 'Dashboard\Agronomic\AgronomicHarvestsController', ['except' => ['destroy', 'show']]); 
        Route::post('agronomic_harvests/eliminate', 'Dashboard\Agronomic\AgronomicHarvestsController@eliminate')->name('agronomic_harvests.eliminate');
        //Incidents
        Route::resource('agronomic_incidents', 'Dashboard\Agronomic\AgronomicIncidentsController', ['except' => ['destroy', 'show']]); 
        Route::post('agronomic_incidents/eliminate', 'Dashboard\Agronomic\AgronomicIncidentsController@eliminate')->name('agronomic_incidents.eliminate');
        //Irrigations
        Route::resource('agronomic_irrigations', 'Dashboard\Agronomic\AgronomicIrrigationsController', ['except' => ['destroy', 'show']]); 
        Route::post('agronomic_irrigations/eliminate', 'Dashboard\Agronomic\AgronomicIrrigationsController@eliminate')->name('agronomic_irrigations.eliminate');
        //Pests
        Route::resource('agronomic_pests', 'Dashboard\Agronomic\AgronomicPestsController', ['except' => ['destroy', 'show']]); 
        Route::post('agronomic_pests/eliminate', 'Dashboard\Agronomic\AgronomicPestsController@eliminate')->name('agronomic_pests.eliminate');
});