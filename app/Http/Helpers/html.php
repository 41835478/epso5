<?php

/**
 * Return a default value
 * @return string
 */
if (!function_exists('no_result')) {
    function no_result()
    {
        return '-';
    }
}

/**
 * Return a default image
 * @return string
 */
if (!function_exists('no_image')) {
    function no_image()
    {
        return 'default.jpg';
    }
}