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
        if($filename == no_image()) {
            $file = storage_path('app/public/' . no_image());
        } else {
            //Get the file
            $file = (in_array($folder, $allowedFolders)) 
                ? storage_path('app/public/' . $folder . '/' . $filename) 
                : storage_path('app/public/' . no_image());
        }

        //
        return Image::make($file)
            ->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->response();
    });