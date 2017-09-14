<?php 

namespace App\Services\Minify;

class MinifyClass {

    private $buffer;
    private $extension = 'js';

    /**
     * @param $files
     * @return mixed|string
     */
    public function debug()
    {
            return $this->buffer;
    }

    /**
     * @param $files
     * @return mixed|string
     */
    public function css()
    {
        $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $this->buffer);
        $buffer = str_replace(["\r\n","\r","\n","\t",'  ','    ','     '], '', $buffer);
        $buffer = preg_replace(['(( )+{)','({( )+)'], '{', $buffer);
        $buffer = preg_replace(['(( )+})','(}( )+)','(;( )*})'], '}', $buffer);
        $buffer = preg_replace(['(;( )+)','(( )+;)'], ';', $buffer);
            return $buffer;
    }

    /**
     * @param $files
     * @return mixed|string
     */
    public function js() {
        $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $this->buffer);
        $buffer = str_replace(["\r\n","\r","\t","\n",'  ','    ','     '], '', $buffer);
        $buffer = preg_replace(['(( )+\))','(\)( )+)'], ')', $buffer);
            return $buffer;
    }

    /**
     * Concatenate an array of files into a string
     *
     * @param $file
     * @return string
     */
    public function file($file)
    {
        $path           = resource_path('assets/js/dashboard/custom/' . $file . '.' . $this->extension);
        $this->buffer   = file_get_contents($path);
            return $this;
    }

    /**
     * Set the extension
     *
     * @param $extension
     * @return string
     */
    public function extension($extension)
    {
        $this->extension = $extension;
            return $this;
    }
}