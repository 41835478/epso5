<?php

/**
 * Set to FALSE
 * @param string $description [Just a funcy way to set a method to FALSE] - Ex: myMethod($param1, $param2, set_false('The user value for the loop...'));
 * @return boolean
 */
if (!function_exists('set_false')) {
    function set_false($description)
    {
        return false;
    }
}

/**
 * Set to TRUE
 * @param string $description [Just a funcy way to set a method to TRUE] - Ex: getUnitiesToArray($key, set_true('First option field value empty. Default is FALSE and it let the first field empty.')
 * @return boolean 
 */
if (!function_exists('set_true')) {
    function set_true($description)
    {
        return true;
    }
}

/**
 * Set to NULL
 * @param string $description [Just a funcy way to set a method to NULL] - Ex: myMethod($param1, $param2, set_null('The user value for the loop...'));
 * @return boolean
 */
if (!function_exists('set_null')) {
    function set_null($description)
    {
        return null;
    }
}