<?php 

namespace App\Services\Icons;

interface IconsInterface {

    /**
     * Generate the html content
     * @param string $icon
     * @return string
     */
    public function htmlBuilder(string $icon) : string;

    /**
     * Get the folder name
     * @return string
     */
    public function getFolder() : string;

    /**
     * Get the font CDN repository
     * @return string
     */
    public function getRepository() : string;
}