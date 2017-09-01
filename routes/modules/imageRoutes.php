<?php 

//Images
Route::name('image')
    ->get('images/{folder}/{filename}', function ($folder, $filename) {
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
            ->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->response();
    });