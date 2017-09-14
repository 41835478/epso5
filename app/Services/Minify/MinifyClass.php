<?php 

namespace App\Services\Minify;

class MinifyClass {

    private $buffer;
    private $file = 'javascript.js';

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
    public function folder($module)
    {
        $path           = resource_path('views/dashboard/_modules/' . $module . '/' . $this->file);
        $this->buffer   = file_get_contents($path);
            return $this;
    }

    /**
     * Set the file
     *
     * @param $file
     * @return string
     */
    public function file($file)
    {
        $this->file = $file;
            return $this;
    }
}