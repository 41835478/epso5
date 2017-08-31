<?php 

/**
 * Include a file from with dottation
 * @param  string $file [path.to.file => path/to/file]
 * @param  string $ext
 * @return array/mixed
 */
if (!function_exists('include_file')) {
    function include_file($file, $ext = '.php')
    {
        return include(str_replace('.', '/', $file) . $ext);
    }
}
