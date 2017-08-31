<?php 

//Images
Route::name('image')
    ->get('images/{folder}/{filename}', function ($folder, $filename) {
        //Allowed folders 
        $allowedFolders = [
            'profile',
        ];
        //Get the file name
        $file = (in_array($folder, $allowedFolders) && is_string($filename)) 
            ? storage_path('app/public/' . $folder . '/' . $filename) 
            : storage_path('app/public/' . $folder . '/' . no_image());
        //
        return Image::make($file)->response();
    });