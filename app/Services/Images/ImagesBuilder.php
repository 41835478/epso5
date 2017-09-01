<?php 

namespace App\Services\Images;

use Illuminate\Support\Facades\Storage;

abstract class ImagesBuilder {

    /**
     * @var protected
     */
    protected $disk     = "profile";
    protected $setName  = null;

    /**
     * Generate a file name
     * @return string
     */
    protected function fileName() : string
    {
        return $this->setName ?? generate_key_md5($length = 10);
    }

    /**
     * Upload a file in storage
     * @return  mixed
     */
    protected function upload()
    {
        if(request('stored_file')) {
            $fileName = $this->fileName() . '.' . request('stored_file')->extension();
            return Storage::disk($this->disk)->putFileAs(null, request('stored_file'), $fileName) 
                ? $fileName
                : no_image();
        }
        return no_image();
    }

    /**
     * Delete a file from storage
     * @param   string      $fileName  
     * @param   string      $storagePath  
     * @return  boolean
     */
    protected function delete($fileName) : bool
    {
        return Storage::disk($this->disk)->delete($fileName) 
            ? $fileName 
            : null;
    }
}