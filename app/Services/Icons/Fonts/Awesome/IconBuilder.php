<?php 

namespace App\Services\Icons\Fonts\Awesome;

use App\Services\Icons\IconsInterface;

class IconBuilder implements IconsInterface {

    /** 
    * @var string    
    */  
    protected $folder = 'Awesome';

    /**
     * Generate the html content
     * @param string $icon
     * @return string
     */
    public function htmlBuilder(string $icon) : string
    {
        return sprintf('<i class="icon fa fa-%s" aria-hidden="true"></i>', $icon);
    }

    /**
     * Get the folder name
     * @return string
     */
    public function getFolder() : string
    {
        return $this->folder;
    }

    /**
     * Get the font CDN repository
     * @return string
     */
    public function getRepository() : string
    {
        return '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
    }
}