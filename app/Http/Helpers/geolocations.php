<?php

/**
 * Get data from sigpac value from the catastro reference
 * @param string $catastro
 * 
 * @return string
 */
if (!function_exists('getCatastro')) {
    function getCatastro()
    {
        return app(App\Services\Geolocation\Servers\Catastro::class);
    }
}

/**
 * Get data from catastro
 * @param object $request
 * 
 * @return string
 */
if (!function_exists('catastro')) {
    function catastro($request)
    {
        //Get the catastro
        return getCatastro()
            ->handler($request);
    }
}

/**
 * Get data from sigpac value from the catastro reference
 * @param string $catastro
 * 
 * @return string
 */
if (!function_exists('catastroToSigpac')) {
    function catastroToSigpac($catastro)
    {
        //Convert to SIGPAC
        return getCatastro()
            ->catastroToSigpac($catastro['reference']);
    }
}

