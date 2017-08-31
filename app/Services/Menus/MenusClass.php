<?php

namespace App\Services\Menus;

use App\Services\Menus\MenusBuilder;

class MenusClass 
{
    /**
     * Generate the methods
     *
     * @param  string $method
     * @param  string $parameters
     *
     * @return Boolean
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([new MenusBuilder, $method], $parameters);
    }
}