<?php

/** God Routes */
Route::group([
        'as'            => 'god.', 
        'middleware'    => 'role:god'
    ], function () {
        //
});