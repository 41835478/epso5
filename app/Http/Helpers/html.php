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

/**
 * Create an option select field with bind data
 * @param intenger $data [The DB value]
 * @param intenger $value
 * @param intenger $title
 * @return string
 */
if (!function_exists('selected')) {
    function selected($data, $value = null, $title = null)
    {
        $selected = ($data == $value) ? ' selected' : '';
            return sprintf('<option data-title="%s" value="%s"%s>%s</option>', $title, $value, $selected, $title);
    }
}