<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Auth" middleware group. Now create something great!
|
*/

/*
| Default Dashboard
*/
Route::name('dashboard')
    ->get('/dashboard', 'Dashboard\HomeController');

/** Dashboard Routes */
Route::group([
    'as' => 'dashboard.', 
    'prefix' => 'dashboard',
    'middleware'    => 'locale'
], function () {
        //Profiles
        //Route::resource('profiles', 'Dashboard\ProfilesController', ['only' => ['edit', 'update']]);  
        //
        //If running tests... fixing the route problem...
        // App::environment('local') for DUSK
        // App::runningUnitTests() for phpUnit
        if(App::environment('local') || App::runningUnitTests()) {
            //Load all the files
            foreach (glob(base_path().'/routes/modules/*.php') as $file){
                require($file);
            }
        //Regular routing...
        } else {
            //Load all the files
            foreach (glob(base_path().'/routes/modules/*.php') as $file){
                require_once($file);
            }
        }
    });