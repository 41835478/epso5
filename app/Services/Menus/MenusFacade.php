<?php

namespace App\Services\Menus;

use Illuminate\Support\Facades\Facade;

class MenusFacade extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return 'MenusProvider'; 
    }
}