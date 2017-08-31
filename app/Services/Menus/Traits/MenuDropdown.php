<?php 
/**
 * Available methods:
    * dropdown($attributes = [], $items)
    * subMenuItem($attributes = [])
    * output()
 */

namespace App\Services\Menus\Traits;

use App\Services\Menus\MenusBuilder as Builder;

trait MenuDropdown {
    /*
    |--------------------------------------------------------------------------
    | Internal method. 
    | Can't be called from the facade
    |--------------------------------------------------------------------------
    */

    /**
     * Open a dropdown menu
     * @param string $title [For the dropdown]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function dropdown($attributes = [], $items) : Builder
    {
        //Get the variables
        extract($this->getAttributes($attributes), EXTR_PREFIX_SAME, "wddx");

        //The Html
        $html = sprintf('<li class="nav-item dropdown %s">', $active);
            $html .= sprintf('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">%s</a>', $title);
            $html .= '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                $html .= $items;
            $html .= '</div>';
        $html .= '</li>';

        if($title) {
            $this->constructor[] = $html;
        }

        return $this;
    }

    /**
     * Generate an submenu item
     * @param array $attributes [title, url and class]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function subMenuItem($attributes = []) : Builder
    {
        //Get the variables
        extract($this->getAttributes($attributes), EXTR_PREFIX_SAME, "wddx");

        //Get the items
        if($title) {
            $this->constructor[] = ($url) ? sprintf('<a class="dropdown-item %s" href="%s">%s</a>', $class, $url, $title) : sprintf('<span>%s</span>', $title);
        }

        return $this;
    }

    /**
     * Alias for getHtml()
     */
    public function output() : string
    {
        return $this->getHtml();
    }
}