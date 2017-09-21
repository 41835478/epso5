<?php

/**
 * Return a select with the first option blank
 * @param array $[options]
 * @param bool $[firstOptionBlank]
 * @return string
 */
if (!function_exists('setOptions')) {
    function setOptions(array $options, bool $firstOptionBlank = true)
    {        
        return $firstOptionBlank ? ['' => ''] + $options : $options;
    }
}