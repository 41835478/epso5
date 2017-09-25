<?php 

/**
 * Return the slanguage file in the section folder
 * 
 * @return  string
 */
if (!function_exists('errorMessageValidation')) {
    function errorMessageValidation($error = '')
    {
        $errorCode = sprintf('Date: %s<br>From: %s<br>Error: %s', date('d/m/Y h:m:s'), request()->url(), $error);
            return trans('geolocations.error', ['email' => config('mail.from.address')]) . '<hr>' . $errorCode;
    }
}