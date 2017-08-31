<?php 
/**
 * Available methods:
    * htmlBuilder()
    * getHtml()()
    * getBrand()
 */

namespace App\Services\Menus\Traits;

trait MenuContainer {
    /*
    |--------------------------------------------------------------------------
    | Internal method. 
    | Can't be called from the facade
    |--------------------------------------------------------------------------
    */

    /**
     * Generate all the HTML
     * @return  string
     */
    private function htmlBuilder() : string
    {
        $html = '<nav class="navbar navbar-toggleable-md ' . $this->navbarClass . '" role="navigation">';
            $html .= '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>';
            $html .= $this->getBrand();
            $html .= '<div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">';
                $html .= $this->getHtml();
            $html .= '</div>';
        $html .= '</nav>';
        
        return $html;
    }

    /**
     * Parse all the HTML from the array to a string
     * @return  string
     */
    private function getHtml() : string
    {
        return implode('', $this->constructor);
    }

    /**
     * Get the brand HTML
     * @return  string
     */
    private function getBrand() : string
    {
        return $this->brand ?? '';
    }
}