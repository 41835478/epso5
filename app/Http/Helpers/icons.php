<?php 

/**
 * Create a icon
 * @param  string $date
 * @return string
 */
if (!function_exists('icon')) {
    function icon($name, $text = null, $position = 'left')
    {
        //Get the icon
        $icon = (new App\Services\Icons\IconsClass)->handler($name);
        //Check for text
        if($text) {
            //Check for the icon position
            return ($position === 'left')
                ? $icon . ' ' . $text 
                : $text . ' ' . $icon;
        }
        //Just the icon with no text
        return $icon;
    }
}

/**
 * Get the icon cdn repository
 * @param  string $date
 * @return string
 */
if (!function_exists('icon_cdn')) {
    function icon_cdn()
    {
        return (new App\Services\Icons\IconsClass)->getCDN();
    }
}