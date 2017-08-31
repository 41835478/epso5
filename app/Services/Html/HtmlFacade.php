<?php

namespace App\Services\Html;

use Illuminate\Support\Facades\Facade;

class HtmlFacade extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return 'HtmlProvider'; 
    }
}