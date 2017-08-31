<?php 

namespace App\Services\Icons;

use App\Services\Icons\IconsInterface;

class IconsClass
{
    /**
     * @var private
     */
    private $builder;

    /**
     * Initialize the constructor
     */
    public function __construct()
    {
        $this->builder = app(IconsInterface::class);
    }

    /**
     * Get the icon
     * @param $name [The icon name]
     * @return mixed
     */
    public function handler(string $name)
    {
        //Builder container
        $folder = $this->builder->getFolder();

        //Get the file with all the icons, and get the selected one
        $icon = $this->getFile($folder)[$name] ?? null;

        return $icon
            ? $this->builder->htmlBuilder($icon)
            : null;
    }

    /**
     * Get the file content
     * @return array
     */
    public function getFile($folder) : array
    {
        return include(app_path('Services/Icons/Fonts/' . $folder . '/Data.php'));
    }

    /**
     * Get the CDN
     * @return string
     */
    public function getCDN() : string
    {
        return $this->builder->getRepository();
    }
}
