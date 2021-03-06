<?php 

namespace App\Services\Images;

use App\Services\Images\ImagesBuilder;

class Images extends ImagesBuilder {

    /**
     * Set the storage disk
     * @return string
     */
    public function disk($storageDisk)
    {
        $this->disk = $storageDisk;

        return $this;
    }

    /**
     * Set the storage disk
     * @return string
     */
    public function setName($setName)
    {
        $this->setName = $setName;

        return $this;
    }

    public function handler()
    {
        if(request('delete_uploded_file') && request('delete_uploded_file') !== no_image()) {
            $this->delete(request('delete_uploded_file'));
        } 

        return $this->upload();
    }
}