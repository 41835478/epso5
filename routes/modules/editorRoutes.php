<?php 

/** Editor Routes */
Route::group([
        'as'            => 'editor.', 
        'middleware'    => 'role:editor'
    ], function () {
        //Users, only the option of delete a/an user/s
        //the rest is in the userRoutes.php
});