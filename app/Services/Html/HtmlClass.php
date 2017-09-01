<?php

namespace App\Services\Html;

use App\Services\Html\Traits\Images;
use App\Services\Html\Traits\Links;
use App\Services\Html\Traits\Pipeline;

class HtmlClass {
    
    use Images, Links;

    /**
     * @var Allowed methods for the Facade
     */
    private $allowed = [
        'link',
        'form',
        'thumbnail',
    ];

    /**
     * @var private
     */
    private $class = [];
    private $folder;
    private $width;

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
        if (in_array($method, $this->allowed)) {
            return call_user_func_array([$this, $method], $parameters);
        }
        return __('Method not allowed');
    }
}