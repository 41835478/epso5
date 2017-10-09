<?php

/** Agronomics Routes */
Route::group([
        'as'            => 'user.', 
        'middleware'    => 'role:user'
    ], function () {
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