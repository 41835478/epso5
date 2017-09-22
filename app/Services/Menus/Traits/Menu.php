<?php 
/**
 * Available methods:
    * new($attributes = [])
    * brand($attributes = [])
    * html($html = [])
    * separator($margin = 15)
    * divider()
    * item($attributes = [])
    * openContainer($css = '')
    * closeContainer()
 */

namespace App\Services\Menus\Traits;

use App\Services\Menus\MenusBuilder as Builder;

trait Menu {

    /**
     * Configurate the navbar
     * @param array $attributes [class]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function new($attributes = []) : Builder
    {
        //Get the variables
        extract($this->getAttributes($attributes), EXTR_PREFIX_SAME, "wddx");

        //Add the css classes to the navbar
        if(isset($class)) {
            $this->navbarClass = $class;
        }
        return $this;
    }

    /**
     * Create the brand link/image
     * @param array $attributes [title, url and class]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function brand($attributes = []) : Builder
    {
        //Get the variables
        extract($this->getAttributes($attributes), EXTR_PREFIX_SAME, "wddx");

        //The brand container.
        if(isset($title)) {
            $this->brand = sprintf('<a class="navbar-brand %s" href="%s">%s</a>', $class, $url, $title);
        }

        return $this;
    }

    /**
     * Create the raw html content
     * @param array $attributes [title, url and class]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function html($html = []) : Builder
    {
        //Set the raw html
        $this->constructor[] = $html;

        return $this;
    }

    /**
     * Generate a horizontal separator for the items
     * is a margin right between items
     * @param integer $margin [numeric]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function separator($margin = 15) : Builder
    {
        //Set the raw html
        $this->constructor[] = '<li style="margin-right: ' . $margin . 'px;"></li>';

        return $this;
    }

    /**
     * Generate a vertical separator (line) between items
     * @param integer $margin [numeric]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function line($attributes = []) : Builder
    {
        //Get the variables
        $attributes['title'] = '<div class="dropdown-divider"></div>';
        extract($this->getAttributes($attributes), EXTR_PREFIX_SAME, "wddx");

        //Set the raw html
        $this->constructor[] = $title;

        return $this;
    }
    
    /**
     * Generate an individual item
     * @param array $attributes [title, url, active and class]
     * @return App\Services\Menus\MenusBuilder;
     */
    public function item($attributes = []) : Builder
    {
        //Get the variables
        extract($this->getAttributes($attributes), EXTR_PREFIX_SAME, "wddx");

        if(isset($inClientList) && !in_array($inClientList, getMenuBar())) {
            return $this;
        }

        //Add each item to the constructor
        if(isset($title)) {
            $this->constructor[] = sprintf('<li class="nav-item %s %s"><a href="%s" class="nav-link">%s</a></li>', $class, $active, $url, $title);
        }

        return $this;
    }

    /**
     * Open a float right navbar
     * @param string $css
     * @return App\Services\Menus\MenusBuilder;
     */
    public function openContainer($css = '') : Builder
    {
        $this->constructor[] = sprintf('<ul class="navbar-nav %s">', ($css ?? ''));

        return $this;
    }

    /**
     * Close a float right navbar
     * @return App\Services\Menus\MenusBuilder;
     */
    public function closeContainer() : Builder
    {
        $this->constructor[] = '</ul>';

        return $this;
    }
}