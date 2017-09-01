<?php 

//Images
Route::name('image')
    ->get('images/{folder}/{filename}/{size}', function ($folder, $filename, $size) {
        //Allowed folders 
        $allowedFolders = [
            'clients', 
            'profile',
        ];
        //Get the file name
        $file = (in_array($folder, $allowedFolders) && is_string($filename)) 
            ? storage_path('app/public/' . $folder . '/' . $filename) 
            : storage_path('app/public/' . $folder . '/' . no_image());
        //
        return Image::make($file)
            ->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->response();
    });