<?php 
/**
 * Available methods:
    * logout()
 */

namespace App\Services\Menus\Traits;

use App\Services\Menus\MenusBuilder as Builder;

trait MenuLogout {

    /**
     * Generate the logout button
     * @return App\Services\Menus\MenusBuilder;
     */
    public function logout() : Builder
    {
        $html = '<li>';
            $html .= '<a href="#"  class="btn btn-danger btn-logout" onclick="event.preventDefault(); document.getElementById( \'logout-form\' ).submit();">';
                $html .= icon('exit');
            $html .= '</a>';
            $html .= '<form id="logout-form" action="' . route('logout') . '" method="POST" style="display: none;">' . csrf_field() . '</form>';
        $html .= '</li>';

        $this->constructor[] = $html;

        return $this;
    }
}