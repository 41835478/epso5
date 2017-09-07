<?php

namespace App\Services\Html;

use App\Services\Html\Traits\Form;
use App\Services\Html\Traits\Images;
use App\Services\Html\Traits\Links;
use App\Services\Html\Traits\Pipeline;

class HtmlClass {
    
    use Form, Images, Links;

    /**
     * @var Allowed methods for the Facade
     */
    private $allowed = [
        'link',
        'checkbox',
        'thumbnail',
    ];

    /**
     * @var private
     */
    protected $class = [];
    protected $folder;
    protected $width;

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