<?php 

/**
 * Return the slanguage file in the section folder
 * 
 * @return  string
 */
if (!function_exists('errorMessageValidation')) {
    function errorMessageValidation($output = 'array')
    {
        $error = trans('errors.errorValidation');
            return ($output == 'array') 
                ? $error
                : inplode(' ', $error);
    }
}